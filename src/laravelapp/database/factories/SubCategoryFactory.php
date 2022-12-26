<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubCategory;

class SubCategoryFactory extends Factory
{
    protected $model =SubCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sub_category_name' => $this->faker->word(),
            'updated_at' => $this->faker->unixTime(),
            'created_at' => $this->faker->unixTime(),
        ];
    }
}
