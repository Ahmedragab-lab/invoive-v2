<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
// use DB;
use Illuminate\Support\Facades\Hash;
// use Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{

public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(5);
return view('users.index',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}

public function create()
{
    $roles = Role::pluck('name','name')->all();

    return view('users.Add_user',compact('roles'));

}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    $this->validate($request, [
    'name' => 'required',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|same:confirm-password',
    'image' => 'image',
    'roles_name' => 'required',
    'status' => 'required',
    ]);
     try{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            if($request->image){
                Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/user-img/' . $request->image->hashName() ));
                $input['image'] = $request->image->hashName();
            }

                $user = User::create($input);
                $user->assignRole($request->input('roles_name'));
                session()->flash('Add','تم الاضافه بنجاح');
                return redirect()->route('users.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
}


public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}

public function edit($id)
{
    $user = User::find($id);
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    return view('users.edit',compact('user','roles','userRole'));
}

public function update(Request $request, User $user)
{
    $this->validate($request, [
        'name' => 'required',
        // 'email' => 'required|email',
        'email' => ['required',Rule::unique('users')->ignore($user->id),],
        // 'password' => 'required|same:confirm-password',
        'image' => 'image',
        'roles_name' => 'required',
        'status' => 'required',
    ]);
    // $input = $request->all();
    $input = $request->all();
        // if(!empty($input['password'])){
        // $input['password'] = Hash::make($input['password']);
        // }else{
        // $input = array_except($input,array('password'));
        // }

        if($request->image){
            if($request->image != 'default.jpg'){
                Storage::disk('public_uploads')->delete('/user-img/' . $user->image);
            }
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user-img/' . $request->image->hashName() ));
            $input['image'] = $request->image->hashName();
        }

    // $user = User::find($id);
    // dd($input);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    $user->assignRole($request->input('roles_name'));
    session()->flash('Edit','تم التعديل بنجاح');
    return redirect()->route('users.index');
}

public function destroy(User $user)
{
    try{
        if($user->image != 'default.jpg'){
             Storage::disk('public_uploads')->delete('/user-img/' . $user->image);
        }
        $user->delete();
        session()->flash('Delete','تم الحذف بنجاح');
        return redirect()->route('users.index');
    } catch (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}
