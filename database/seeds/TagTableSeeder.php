<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 10)->create()->each(function($u) {
            //$u->client()->save(factory(Client::class)->make());
        });
    }
}
