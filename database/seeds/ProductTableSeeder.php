<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('products')->truncate();

		factory(Product::class, 10)->create();
	}
}