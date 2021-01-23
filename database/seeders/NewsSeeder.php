<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('news')->insert(
			$this->getData()
		);
    }
	public function getData()
	{
		$faker = Factory::create('ru_RU');

		$data = [];
		for($i = 0; $i < 10; $i++) {
			$title = $faker->sentence(mt_rand(3,10));
			$data[] = [
				'category_id' => 2,
                'source_id' => random_int(1,5),
				'title'  => $title,
				'slug'   => \Str::slug($title),
				'description' => $faker->realText(mt_rand(100,200)),
                'created_at' => now(),
                'updated_at' => now(),
			];
		}
		return $data;
	}
}
