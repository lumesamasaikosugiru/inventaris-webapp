<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            "description" => $this->faker->word(),
            "sku" => "123455" . $this->faker->word(),
            "price" => $this->faker->numberBetween(10000, 100000),
            "stok" => $this->faker->randomNumber(),
            "category_id" => $this->faker->randomElement(Category::pluck('id')),
        ];
    }
}
