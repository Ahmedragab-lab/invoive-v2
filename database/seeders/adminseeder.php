<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     =>'wolf',
            'email'    =>'ahmedragabyasin2020@gmail.com',
            'password' =>bcrypt('258258258'),
            'admin'    =>'1',
        ]);
    }
}
