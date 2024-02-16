<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'phone' => '0000000000',
            'email' => 'admin@icloud.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
