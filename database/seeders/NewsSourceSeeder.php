<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news_sources')->insert(
            $this->getData()
        );
    }
    public function getData()
    {
        $faker = Factory::create('ru_RU');

        $data = [];
        for($i = 0; $i < 5; $i++) {
            $word = Str::random(10);
            $data[] = [
                'name'  => $faker->sentence(mt_rand(1,2)),
                'url' => "http:\\www.{$word}.com"
            ];
        }
        return $data;
    }
}
