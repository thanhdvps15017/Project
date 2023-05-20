<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        static $sort = 1;
        $name = $this->faker->unique()->word();
        $slug = Str::slug($name . '-' . Str::random(6));
        return [
            'name' => $name,
            'slug' => $slug,
            'appear' => 1,
            'deleted' => 0,
            'sort' => $sort++,
        ];
    }
}
