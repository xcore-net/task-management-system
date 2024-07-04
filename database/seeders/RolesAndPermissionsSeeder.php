<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create field']);
        Permission::create(['name' => 'update field']);
        Permission::create(['name' => 'view field']);
        Permission::create(['name' => 'delete field']);

        Permission::create(['name' => 'create form']);
        Permission::create(['name' => 'update form']);
        Permission::create(['name' => 'view form']);
        Permission::create(['name' => 'delete form']);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo([
            'create field', 'update field', 'view field',
            'create form', 'update form', 'view form'
        ]);

        $admin = User::factory()->create([
            'email' => 'admin@example.com'
        ]);

        $admin->assignRole('admin');

        $user = User::factory()->create([
            'email' => 'user@example.com'
        ]);

        $user->assignRole('user');
    }
}
