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
        \App\Models\User::factory(5)->create();
        \App\Models\Book::factory(30)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Title::factory(10)->create();
        // $this->call(BooksTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(TitleSeeder::class);
    }
}
