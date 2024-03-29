<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->belongsToMany(ProductProperty::class, 'product_property_product')
            ->withTimestamps()
            ->withPivot('value');
    }
}
