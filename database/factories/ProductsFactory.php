<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomNumber(4),
            'file' => "https://via.placeholder.com/300/".rand(222141, 422141),
            'description' => $this->faker->text,
            'details' => $this->faker->text,
            'must' => rand(1, 50),
            'slug' => $this->faker->unique()->slug,
            'status' => 1,
            'category_id' => 0,
//          'category_id' => Category::factory(),
        ];
    }
}
