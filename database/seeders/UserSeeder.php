<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);

        // 2. Create Admin User
        $admin = User::create([
            'uuid' => Str::uuid(),
            'name' => 'System Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'phone_number' => '0123456789',
            'password' => Hash::make('password123'),
            'position' => 'System Administrator',
            'is_active' => true,
        ]);
        $admin->assignRole($adminRole);

        // 3. Create Staff User
        $staff = User::create([
            'uuid' => Str::uuid(),
            'name' => 'Regular Staff',
            'email' => 'staff@example.com',
            'username' => 'staff',
            'phone_number' => '0198765432',
            'password' => Hash::make('password123'),
            'position' => 'Sales Staff',
            'is_active' => true,
        ]);
        $staff->assignRole($staffRole);
    }
}