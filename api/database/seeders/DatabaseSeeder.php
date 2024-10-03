<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Screening;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Film::factory(20)->create();
        Screening::factory(200)->create();
    }
}
