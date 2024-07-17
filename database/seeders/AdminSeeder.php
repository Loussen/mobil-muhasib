<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crud = [
            'list',
            'create',
            'delete',
            'edit'
        ];
        $roles = [
            'super-admin',
            'accountant',
            'driver',
            'warehouse-staff',
        ];
        $permissions = [
            'add to parcel shelf',
            'dashboard'
        ];
        $permissionsCrud = [
            'pudo',
            'workdays',
            'tariffs',
            'company',
            'company users',
            'parcel',
            'box',
            'shipment',
            'invoice',
            'status',
            'company api token',
            'admin'
        ];
        foreach ($permissionsCrud as $permission) {
            foreach ($crud as $value) {
                $permissions[] = $permission." ".$value;
            }
        }
        /* Create Permissions */
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'backpack'
            ]);
        }
        /* Create Roles */
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'backpack'
            ]);
        }
        /* Give all permissions to super admin */
        $role = Role::where('name', 'super-admin')->first();
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
        /* Create admin */
        $faker = Faker::create();
        $admin = Admin::create([
            'name' => $faker->userName,
            'email' => 'admin@' . env('MAIN_DOMAIN'),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $admin->assignRole($role);
    }
}
