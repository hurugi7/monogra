<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->randomNumber(2),
            'category_name' => $this->faker->word(),
            'user_id' => User::factory(),
            'updated_at' => $this->faker->unixTime(),
            'created_at' => $this->faker->unixTime(),
        ];
    }
}
