<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-crete',
            'user-edit',
            'user-delete',
            'project-list',
            'project-crete',
            'project-edit',
            'project-delete',
            'listing-list',
            'listing-crete',
            'listing-edit',
            'listing-delete',
            'booking-list',
            'booking-crete',
            'booking-edit',
            'booking-delete',
            'clientele-list',
            'clientele-crete',
            'clientele-edit',
            'clientele-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
