<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();
//        $this->call(CategoriesSeeder::class);
//        $this->call(ProductsSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(UserSeeder::class);

        Category::factory()->has(
            Product::factory()->count(5)
        )->count(6)->create();
    }
}
