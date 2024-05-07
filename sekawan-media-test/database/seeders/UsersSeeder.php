<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Pihak yang menyetujui
        DB::table('users')->insert([
            'name' => 'Approver',
            'email' => 'approver@example.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);
    }
}

