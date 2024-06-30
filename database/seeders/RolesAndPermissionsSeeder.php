<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset chached roles and permision
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
      // $roleUser->givePermissionTo(['create field', 'update field', 'view field']);
       $roleUser->givePermissionTo(['create form', 'update form', 'view form']);
        
       
       $admin = User::factory()->create([
        'email' => 'admin@adminn.com',
        
       ]);
       $admin->assignRole('admin');

       $user = User::factory()->create([
        'email' => 'user@examplee.com',
       ]);
       $user->assignRole('user');
    }
}