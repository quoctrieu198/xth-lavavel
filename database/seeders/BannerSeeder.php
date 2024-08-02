<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('banners')->insert([
                'name' => $faker->word,
                'img_banner' => $faker->imageUrl(640, 480, 'banners', true),
                'is_active' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
