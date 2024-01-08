<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition( )
    {
        $faker = \Faker\Factory::create();
        return [
            'name' => 'product '.$faker->word(),
            'price' => rand(1,33),
            'amount' => rand(1,33),
        ];
    }
}
