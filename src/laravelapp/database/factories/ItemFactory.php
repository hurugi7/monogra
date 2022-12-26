<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

class ItemFactory extends Factory
{
    protected $model = Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->word(),
            'item_num' => $this->faker->numberBetween(1, 20),
            'purchased_at' => $this->faker->date(),
            'price' => $this->faker->numberBetween(100, 4000),
            'purchased_in'=> $this->faker->city(),
            'note' => $this->faker->paragraph(2),
            'image_path' => $this->faker->imageUrl(360, 360, 'item', true),
            'updated_at' => $this->faker->unixTime(),
            'created_at' => $this->faker->unixTime(),
        ];
    }
}
