<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('categories')->truncate();

		factory(Category::class, 10)->create();
	}
}