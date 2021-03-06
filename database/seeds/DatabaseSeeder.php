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
        // $this->call(UsersTableSeeder::class);
        factory(App\Category::class,50)->create();
        factory(App\Blog::class,200)->create();
        factory(App\Tags::class,20)->create();
    }
}
