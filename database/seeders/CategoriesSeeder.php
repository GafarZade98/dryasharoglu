<?php

namespace Database\Seeders;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::factory()->count(20)->create();
    }
}
