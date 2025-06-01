<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 2,
                'username' => 'user',
                'name' => 'User',
                'email' => 'user@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('123'),
                'remember_token' => null,
                'role' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'username' => 'mitra',
                'name' => 'Mitra',
                'email' => 'mitra@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('123'),
                'remember_token' => null,
                'role' => 'Mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'username' => 'admin1',
                'name' => 'admin1',
                'email' => null,
                'email_verified_at' => null,
                'password' => Hash::make('12345'),
                'remember_token' => null,
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
