<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //  create permission modul
         Permission::create(['name' => 'administrasi-modul']);
        //  Permission::create(['name' => 'sarpras-modul']);

        // PERMISSION ADMINISTRASI
        // user
        Permission::create(['name' => 'create user-administrasi']);
        Permission::create(['name' => 'read user-administrasi']);
        Permission::create(['name' => 'update user-administrasi']);
        Permission::create(['name' => 'delete user-administrasi']);
        // unit
        Permission::create(['name' => 'create unit-administrasi']);
        Permission::create(['name' => 'read unit-administrasi']);
        Permission::create(['name' => 'update unit-administrasi']);
        Permission::create(['name' => 'delete unit-administrasi']);
        // role 
        Permission::create(['name' => 'create role-administrasi']);
        Permission::create(['name' => 'read role-administrasi']);
        Permission::create(['name' => 'update role-administrasi']);
        Permission::create(['name' => 'delete role-administrasi']);
        // permission
        Permission::create(['name' => 'create permission-administrasi']);
        Permission::create(['name' => 'read permission-administrasi']);
        Permission::create(['name' => 'update permission-administrasi']);
        Permission::create(['name' => 'delete permission-administrasi']);

        // END PERMISSION ADMINISTRASI

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super Administrator']);

        $role2 = Role::create(['name' => 'Administrator']);

        $role2->givePermissionTo('administrasi-modul');
        $role2->givePermissionTo('create user-administrasi');
        $role2->givePermissionTo('read user-administrasi');
        $role2->givePermissionTo('update user-administrasi');
        $role2->givePermissionTo('delete user-administrasi');
        
        $role2->givePermissionTo('create unit-administrasi');
        $role2->givePermissionTo('read unit-administrasi');
        $role2->givePermissionTo('update unit-administrasi');
        $role2->givePermissionTo('delete unit-administrasi');

        $role2->givePermissionTo('create role-administrasi');
        $role2->givePermissionTo('read role-administrasi');
        $role2->givePermissionTo('update role-administrasi');
        $role2->givePermissionTo('delete role-administrasi');


        $role3 = Role::create(['name' => 'Unit']);
        // $role3->givePermissionTo('administrasi-modul');
        $role3->givePermissionTo('read user-administrasi');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@unmerpas.ac.id',
            'slug' =>'super-administrator',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@unmerpas.ac.id',
            'slug'=> 'admin-user',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Unit User',
            'email' => 'unit@unmerpas.ac.id',
            'slug'=> 'unit-user',
        ]);
        $user->assignRole($role3);

       
         
    }
}
