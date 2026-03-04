<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // name of titel?
        Permission::create(['name' => 'index course']);
        Permission::create(['name' => 'show course']);
        Permission::create(['name' => 'create course']);
        Permission::create(['name' => 'edit course']);
        Permission::create(['name' => 'delete course']);

        Permission::create(['name' => 'index module']);
        Permission::create(['name' => 'show module']);
        Permission::create(['name' => 'create module']);
        Permission::create(['name' => 'edit module']);
        Permission::create(['name' => 'delete module']);

        Permission::create(['name' => 'index lesson']);
        Permission::create(['name' => 'show lesson']);
        Permission::create(['name' => 'create lesson']);
        Permission::create(['name' => 'edit lesson']);
        Permission::create(['name' => 'delete lesson']);

        Permission::create(['name' => 'index enrollment']);
        Permission::create(['name' => 'show enrollment']);
        Permission::create(['name' => 'create enrollment']);
        Permission::create(['name' => 'edit enrollment']);
        Permission::create(['name' => 'delete enrollment']);



        $student = Role::create(['name' => 'student'])
            ->givePermissionTo(['index course', 'show course', 
                                'index module', 'show module', 
                                'index lesson', 'show lesson', 
                                'index enrollment', 'delete enrollment', 'create enrollment'
                            ]);

        $teacher = Role::create(['name' => 'teacher'])
            ->givePermissionTo(['index course', 'show course', 'create course', 'edit course', 'delete course',
                               'index module', 'show module', 'create module', 'edit module', 'delete module',
                               'index lesson', 'show lesson', 'create lesson', 'edit lesson', 'delete lesson',
                               'index enrollment', 'show enrollment',
                            ]);
        
        $admin = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
    }
}