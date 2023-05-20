<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brands>
 */
class BrandsFactory extends Factory
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
            'name' => $name,
            'slug' => $slug,
            'appear' => 1,
            'deleted' => 0,
        ];
    }
}
