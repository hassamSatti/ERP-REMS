<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = User::create([
            'name' => 'Admin Login', 
            'fname' => 'N/A', 
            'image' => 'Hassam Satti-M Ikhlaq.jpg',
            'cnic' => 'N/A',
            'phone' => 'N/A',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'address' => 'N/A',
            'department' => '1',
            'designation' => '1',
            'user_type' => '0',
            'user_status' => '1',
        ]);
         
        $role = Role::find(1);

        $permissions = Permission::pluck('id', 'id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
