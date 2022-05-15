<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("posts")->insert([
            "name" => $faker->name(),
            "slug" => $faker->slug,
            "description" => $faker->text,
            "yt_iframe" => $faker->text,
            "meta_title" => $faker->text,
            "meta_description" => $faker->text,
            "meta_keyword" => $faker->address,
            "status" => $faker->numberBetween(0, 1),
            "created_by" => $faker->address,
            "category_id" => $faker->address,
            "image" => $faker->address,
        ]);
    }
}
