<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
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
//        Category::factory()->count(5)->create();
//        Product::factory()->count(20)->create();
//        Brands::factory()->count(5)->create();
//        ProductComment::factory()->count(5)->create();
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
