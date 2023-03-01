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
        Permission::create(['name' => 'create user-information']);
        Permission::create(['name' => 'read user-information']);
        Permission::create(['name' => 'update user-information']);
        Permission::create(['name' => 'delete user-information']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create user-information');
        $role1->givePermissionTo('read user-information');
        $role1->givePermissionTo('update user-information');
        $role1->givePermissionTo('delete user-information');

        $role2 = Role::create(['name' => 'member']);
        $role2->givePermissionTo('read user-information');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@unmerpas.ac.id',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Member User',
            'email' => 'member@unmerpas.ac.id',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@unmerpas.ac.id',
        ]);
        $user->assignRole($role3);
         
    }
}
