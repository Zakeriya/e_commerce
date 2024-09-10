<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Sellerpermissions=['add_product','delete_product','edit_product'];

        foreach ($Sellerpermissions as $permission) {
           Permission::create([
                'name'=>$permission,
                'guard_name'=>'seller'
           ]);
        }
        $adminPermissions=['add_seller','delete_seller','edit_seller','add_user','delete_user','edit_user'];

        foreach ($adminPermissions as $permission) {
            Permission::create([
                 'name'=>$permission,
                 'guard_name'=>'admin'
            ]);
         }
    }
}
