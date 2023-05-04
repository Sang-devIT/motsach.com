<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableBanner;

class TableBannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableBanner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stt' => $this->faker->numberBetween(-10000, 10000),
            'photo' => $this->faker->word,
            'link' => $this->faker->word,
            'type' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
