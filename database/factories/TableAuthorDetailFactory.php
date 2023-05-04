<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TableAuthor;
use App\Models\TableAuthorDetail;
use App\Models\TableProduct;

class TableAuthorDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TableAuthorDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'authour_id' => TableAuthor::factory(),
            'product_id' => TableProduct::factory(),
        ];
    }
}
