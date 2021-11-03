<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder{
    /*** Run the database seeds.** @return void*/
    public function run(){
        $user = User::create([
            'name'     =>'wolf',
            'email'    =>'ahmedragabyasin2020@gmail.com',
            'password' =>bcrypt('258258258'),
            'roles_name'=>['Owner'],
            'status'=>'active',
        ]);
        $role = Role::create([
            'name' => 'Admin'
        ]);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }}
