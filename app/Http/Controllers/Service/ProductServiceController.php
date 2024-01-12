<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductServiceController extends Controller
{

    public static function response($products0, $responseType = null)
    {
        switch ($responseType) {
            // смотрим скл запрос
            case 'showSql':
                return response()->json(
                    $products0->toSql());
                break;
            // мини массив кратко показаны результаты
            case 'array_mini':
                return self::typeMiniResponse($products0->get());
                break;
            // обычный вывод .. для фреймворка на фронте
            default:
                return response()->json(ProductResource::collection($products0->paginate(40)));
                break;
        }

    }

    /**
     *  если возвращаем мини массив для быстрого понимания фильтрации при работе с апи
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function typeMiniResponse($data)
    {
        $pr = [];
        foreach ($data as $p) {
            $pr[$p->name] = '';
            foreach ($p->properties as $o) {
                $pr[$p->name] .= (!empty($pr[$p->name]) ? ' _ ' : '') . $o->name;
                $pr[$p->name] .= ':' . $o->pivot->value;
            }
        }
        $pr['count'] = sizeof($pr);
        return response()->json($pr);

    }

    public static function getProduct(Request $request)
    {
        $optionsFilter = $request->input('property');
        $products0 = Product::addSelect('*')->where(function ($subQuery2) use ($optionsFilter) {

            if (!empty($optionsFilter))
                foreach ($optionsFilter as $optionName => $arValues) {

                    $subQuery2->whereHas('properties', function ($query) use ($optionsFilter, $optionName, $arValues) {
                        $query->where(function ($subQuery)
                        use ($optionName, $arValues, $optionsFilter) {
                            $subQuery->where('product_properties.name', $optionName);
                            foreach ($arValues as $value) {
                                $subQuery->where('product_property_product.value', $value);
                            }
                        });
                    });
                }
        })
        ;

        return $products0;
    }
}
