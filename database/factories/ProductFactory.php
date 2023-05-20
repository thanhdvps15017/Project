<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        $slug = Str::slug($name . '-' . Str::random(6));
        return [
            'brand_id' => $this->faker->randomElement([ 1, 2,3,4,5]),
            'category_id' => $this->faker->randomElement([ 1, 2,3,4,5]),
//            'product_category_id' => $this->faker->randomElement([ 1, 2,3,4,5]),
            'name' => $name,
            'slug' => $slug,
            'images' => $this->faker->imageUrl(),
            'view' => $this->faker->numberBetween(0, 1000),
            'bought' => $this->faker->numberBetween(0, 1000),
            'description' => $this->faker->paragraph(),
            'contents' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'price_pay' => $this->faker->randomFloat(2, 0, 1),
            'discount' => $this->faker->randomFloat(2, 0, 1),
            'sku' => $this->faker->unique()->isbn10(),
            'sex' => $this->faker->randomElement([0, 1, 2]),
            'deleted' => 0,
            'appear' => 1,
        ];
    }
}
