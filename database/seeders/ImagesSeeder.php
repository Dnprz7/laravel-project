<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => '1712847741desktop-wallpaper-cat-love-cat-cats.jpg',
            'description' => 'See my beautiful cat, Gati and her new friend Gala',
            'tag' => 'cats',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'user_id' => 2,
            'image_path' => '1712843791cat-5628953_640.jpg',
            'description' => 'This is my pet, his name is Gustavo',
            'tag' => 'cat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => '1712847723EL76VnAVUAAWIVP.jpg',
            'description' => 'This is Vin',
            'tag' => 'mistborn',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => '1713331467mistborn_by_marcsimonetti-d73xjvq.jpg',
            'description' => 'The best books, the first era from Mistborn',
            'tag' => 'mistborn',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'user_id' => 2,
            'image_path' => '171285394720170827-MW-El-archivo-de-las-tormentas-02.jpg',
            'description' => 'Stormlight archive',
            'tag' => 'Brandon Sanderson',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('images')->insert([
            'user_id' => 2,
            'image_path' => '1712786216Call-To-Adventure-The-Stormlight-Archive-cover-art.jpg',
            'description' => 'This is insane',
            'tag' => 'Brandon Sanderson',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
