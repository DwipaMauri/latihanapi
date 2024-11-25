<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin24@gmail.com',
            'password' => Hash::make('admin123'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
