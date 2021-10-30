<?php

namespace Database\Seeders;

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
        \App\Models\Setting::factory(1)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\About::factory(1)->create();
        \App\Models\Social::factory(1)->create();
        \App\Models\Category::factory(5)->create();
    }
}
