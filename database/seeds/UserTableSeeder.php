<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

	public function run()
	{
		factory(User::class, 10)->create()->each(function($u) {
            //$u->client()->save(factory(Client::class)->make());
        });

	}
}