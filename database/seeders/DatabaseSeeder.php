<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $roleSuperAdmin = Role::query()->firstOrCreate(
            ['nama_role' => 'super_admin'],
            [
                'deskripsi' => 'Akses penuh sistem',
                'aktif' => true,
            ]
        );

        $user = User::query()->updateOrCreate([
            'email' => 'superadmin@lesrenang.test',
        ], [
            'nama_lengkap' => 'Super Admin',
            'kata_sandi' => 'password123',
            'aktif' => true,
        ]);

        $user->roles()->syncWithoutDetaching([$roleSuperAdmin->id_roles]);
    }
}
