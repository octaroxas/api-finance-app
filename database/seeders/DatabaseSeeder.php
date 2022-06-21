<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::create(['name' => 'Saúde']);
        Category::create(['name' => 'Alimentação']);
        Category::create(['name' => 'Casa']);
        Category::create(['name' => 'Outros']);

        $this->call(TestSeeder::class);
    }
}
