<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableOrder;

class TableOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_date' => $this->faker->dateTime(),
            'total_money' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->word,
            'order_code' => $this->faker->word,
        ];
    }
}
