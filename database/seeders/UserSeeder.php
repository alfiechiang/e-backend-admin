<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $role =Role::where('en_name','ADMIN')->first();
        User::create([
            'name'=>'admin',
            'password'=>bcrypt('123456'),
            'role_id'=>$role->id
        ]);

    }
}
