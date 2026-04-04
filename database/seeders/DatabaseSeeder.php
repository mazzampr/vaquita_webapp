<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate([
            'email' => 'superadmin@lesrenang.test',
        ], [
            'name' => 'Super Admin',
            'password' => 'password123',
            'role' => UserRole::SuperAdmin,
            'is_active' => true,
        ]);
    }
}
