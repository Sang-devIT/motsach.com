<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableProduct;
use App\Models\TableVoucher;

class TableVoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableVoucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_product' => TableProduct::factory(),
            'name' => $this->faker->name,
            'code' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
