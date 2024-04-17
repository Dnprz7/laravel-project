<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Pedro',
            'surname' => 'Perez',
            'nick' => 'pedroperez',
            'email' => 'pedro@perez.com',
            'password' => Hash::make('password'),
            'image' => "1713217870384b4fb0931512d75b53a85c293391a5.jpg",
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => null,
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Maria',
            'surname' => 'Rivera',
            'nick' => 'MariRivera',
            'email' => 'maria@rivera.com',
            'password' => Hash::make('password'),
            'image' => "171323985308c57bf7d2efe0973cce2a55ccac7f62.jpg",
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => null,
        ]);
    }
}
