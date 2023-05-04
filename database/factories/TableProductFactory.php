<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableCategory;
use App\Models\TablePrduce;
use App\Models\TableProduct;

class TableProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_category' => TableCategory::factory(),
            'id_priduce' => TablePrduce::factory(),
            'photo' => $this->faker->word,
            'name' => $this->faker->name,
            'regular_price' => $this->faker->numberBetween(-10000, 10000),
            'sale_price' => $this->faker->numberBetween(-10000, 10000),
            'discount' => $this->faker->numberBetween(-10000, 10000),
            'code' => $this->faker->word,
            'stt' => $this->faker->numberBetween(-10000, 10000),
            'desc' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'stock' => $this->faker->numberBetween(-10000, 10000),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
            'status' => $this->faker->word,
            'slug' => $this->faker->slug,
        ];
    }
}
