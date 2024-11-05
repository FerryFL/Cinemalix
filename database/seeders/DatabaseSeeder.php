<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123'),
            'DOB' => date(now()),
            'Balance' => 0,
            'IsAdmin' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('genres')->insert([
            'GenreName' => 'Romance',
        ]);
    }
}
