<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\SubCategory;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(4)
            ->has(
                Category::factory()
                ->count(8)
                ->state(function (array $attributes, User $user) {
                    return ['user_id' => $user->id];
                })
                ->has(
                    SubCategory::factory()
                    ->count(5)
                    ->state(function (array $attributes, Category $category) {
                        return ['category_id' => $category->id];
                    })
                    ->has(
                        Item::factory()
                        ->count(10)
                        ->state(function (array $attributes,SubCategory $subCategory) {
                            return ['sub_category_id' => $subCategory->id];
                        })
                        )
                    )
                )
            ->create();
    }
}
