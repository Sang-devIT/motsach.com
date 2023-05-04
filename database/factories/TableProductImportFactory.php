<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableProductImport;

class TableProductImportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableProductImport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'import_date' => $this->faker->dateTime(),
            'total_money' => $this->faker->numberBetween(-10000, 10000),
            'import_code' => $this->faker->word,
        ];
    }
}
