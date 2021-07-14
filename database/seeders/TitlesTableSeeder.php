<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Title;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Title::class)->create();
        title::factory()->count(10)->create();
    }
}
