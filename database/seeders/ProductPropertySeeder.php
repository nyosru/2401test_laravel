<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Seeder;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductProperty::factory(1)
            ->create(['name'=>'prop1']);

        ProductProperty::factory(1)
            ->create(['name'=>'prop2']);

        ProductProperty::factory(1)
            ->create(['name'=>'prop3']);

//        ProductProperty::factory(50)
////            ->state(new Sequence(
////                fn (Sequence $sequence) => ['ar_price_id' => ArPrice::all()->random()],
////            ))
//            ->create();



    }
}
