<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat pengguna admin jika belum ada
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        // Menambahkan manajer jika belum ada
        $managers = [
            ['name' => 'Manager 1', 'email' => 'manager1@example.com', 'password' => Hash::make('password'), 'role' => 'manager'],
            ['name' => 'Manager 2', 'email' => 'manager2@example.com', 'password' => Hash::make('password'), 'role' => 'manager'],
        ];

        foreach ($managers as $manager) {
            if (!User::where('email', $manager['email'])->exists()) {
                User::create($manager);
            }
        }

        // Menambahkan karyawan jika belum ada
        $employees = [
            ['name' => 'Karyawan 1', 'email' => 'employee1@example.com', 'password' => Hash::make('password'), 'role' => 'employee'],
            ['name' => 'Karyawan 2', 'email' => 'employee2@example.com', 'password' => Hash::make('password'), 'role' => 'employee'],
            ['name' => 'Karyawan 3', 'email' => 'employee3@example.com', 'password' => Hash::make('password'), 'role' => 'employee'],
            ['name' => 'Karyawan 4', 'email' => 'employee4@example.com', 'password' => Hash::make('password'), 'role' => 'employee'],
            ['name' => 'Karyawan 5', 'email' => 'employee5@example.com', 'password' => Hash::make('password'), 'role' => 'employee'],
        ];

        foreach ($employees as $employee) {
            if (!User::where('email', $employee['email'])->exists()) {
                User::create($employee);
            }
        }
    }
}
