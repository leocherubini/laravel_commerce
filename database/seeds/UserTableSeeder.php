<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->truncate();

		factory(User::class, 10)->create();

	}
}