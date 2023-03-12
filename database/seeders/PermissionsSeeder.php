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

        // create permissions
        Permission::create(['name' => 'administrasi-modul']);

        Permission::create(['name' => 'create user-information']);
        Permission::create(['name' => 'read user-information']);
        Permission::create(['name' => 'update user-information']);
        Permission::create(['name' => 'delete user-information']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super Administrator']);

        $role2 = Role::create(['name' => 'Administrator']);
        $role2->givePermissionTo('administrasi-modul');
        $role2->givePermissionTo('create user-information');
        $role2->givePermissionTo('read user-information');
        $role2->givePermissionTo('update user-information');
        $role2->givePermissionTo('delete user-information');

        $role3 = Role::create(['name' => 'Unit']);
        $role3->givePermissionTo('read user-information');

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
