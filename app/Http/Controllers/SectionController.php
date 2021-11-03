<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        return view('backend.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        try {
            $validated = $request->validated();
            Section::create([
                // 'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'name' => $request->name,
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح');
            return redirect('sections');

//            $categories = new categorie();
//            //$categories->name = ['ar' => $request->name, 'en' => $request->name_en];
//            $categories->notes = $request->notes;
//            $categories->save();
//             session()->flash('Add', 'تم اضافة المنتج بنجاح ');
//            return redirect('categories');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSectionRequest $request)
    {
        $section = Section::findorFail($request->id);

        try {
            $validated = $request->validated();
            $section->update([
                'name'=> $request->name,
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', 'تم تعديل القسم بنجاح');
            return redirect('sections');

//            $categories = categorie::findorfail($request->id);
//            $categories->name = ['ar' => $request->name, 'en' => $request->name_en];
//            $categories->notes = $request->notes;
//            $categories->save();
//            session()->flash('Edit', 'تم تعديل المنتج بنجاح');
//            return redirect('categories');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
//          categorie::findorFail($id)->delete();
            Section::destroy($id);
            session()->flash('Deleted', 'تم حذف القسم بنجاح');
            return redirect('sections');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
