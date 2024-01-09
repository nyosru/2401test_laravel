<?php

namespace Database\Seeders;

use App\Models\ArObject;
use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

// чёткое добавление чтобы можно было потестить варианты которые точно есть
        for ($pp = 1; $pp <= 2; $pp++) {
            $properties = ProductProperty::factory(1)->create(['name' => 'prop' . $pp]);
            Product::factory(20)
                ->create()->each(function ($product) use ($properties) {
                    $product->properties()->attach(
                        $properties->first()->pluck('id')
                        , ['value' => 'val' . rand(1, 5)]);
                });
        }

        $properties = ProductProperty::factory(5)->create();
        Product::factory(500)
            ->create()->each(function ($product) use ($properties) {
                $product->properties()->attach(
                    $properties->random(rand(1, 5))->pluck('id')
                    , ['value' => 'value ' . rand(1, 10000)
                ]);
            });
    }
}
