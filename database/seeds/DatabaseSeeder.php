<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\address:: class, 1000)->create();
        factory(\App\User::class, 500)->create();
        factory(\App\product::class, 1500)->create();
        factory(\App\image::class, 3500)->create();
        factory(\App\review::class, 3500)->create();
        factory(\App\category::class, 50)->create();
        factory(\App\tag::class, 150)->create();

    }
}
