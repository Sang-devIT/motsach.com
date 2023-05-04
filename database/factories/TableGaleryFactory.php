<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableGalery;
use App\Models\TableProduct;

class TableGaleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableGalery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => TableProduct::factory(),
            'thumbnail' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
