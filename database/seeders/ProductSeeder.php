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

//        // Создаем 10 свойств товаров с использованием фабрики
//        $properties = factory(ProductProperty::class, 30)->create();
        $properties = ProductProperty::factory(30)->create();
//
//        // Создаем 50 товаров и присваиваем им случайные свойства
//        factory(Product::class, 200)->create()->each(function ($product) use ($properties) {
//            // Присваиваем товару случайные свойства
//            $product->properties()->attach($properties->random(rand(1, 5))->pluck('id'));
//        });

//        Product::factory(500)
//////            ->state(new Sequence(
//////                fn (Sequence $sequence) => ['ar_price_id' => ArPrice::all()->random()],
//////            ))
////            ->create();
//            ->create()->each(function ($product) use ($properties) {
//            // Присваиваем товару случайные свойства
//            $product->properties()->attach($properties->random(rand(1, 5))->pluck('id'));
        Product::factory(500)
            ->create()->each(function ($product) use ($properties) {
                $product->properties()->attach(
                    $properties->random(rand(1, 5))->pluck('id')
                    , ['value' => 'value '.rand(1, 10000)
                ]);
            });
    }
}
