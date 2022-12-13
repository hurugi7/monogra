<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

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
            )
            ->create();
    }
}
