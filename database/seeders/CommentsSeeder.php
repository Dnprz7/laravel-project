<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'image_id' => 1,
            'content' => 'WOW Gati and Gala!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'image_id' => 1,
            'content' => 'Cats!!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'image_id' => 2,
            'content' => 'Hi Gustavo!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
