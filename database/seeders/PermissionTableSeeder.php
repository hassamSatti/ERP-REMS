<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'User List',
            'User Create',
            'User Edit',
            'User Delete',
            'Role List',
            'Role Create',
            'Role Edit',
            'Role Delete',
            'Permission List',
            'Permission Create',
            'Permission Edit',
            'Permission Delete',
            'Department List',
            'Department Create',
            'Department Edit',
            'Department Delete',
        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
