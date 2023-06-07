<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableOrder;
use App\Models\TableOrdersDetail;
use App\Models\TableProduct;
use App\Models\TableUser;

class TableOrdersDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableOrdersDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_orders' => TableOrder::factory(),
            'id_product' => TableProduct::factory(),
            'price' => $this->faker->numberBetween(-10000, 10000),
            'total_money' => $this->faker->numberBetween(-10000, 10000),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'id_user' => TableUser::factory(),
        ];
    }
}
