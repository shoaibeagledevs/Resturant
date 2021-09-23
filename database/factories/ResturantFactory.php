<?php

namespace Database\Factories;

use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResturantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resturant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
