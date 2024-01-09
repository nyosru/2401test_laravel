<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getProducts",
     *     tags={"Products"},
     *     summary="Получение списка товаров",
     *     description="Получение списка товаров с авторизацией по Bearer токену.",
     *     security={
     *         {"bearerAuth": {}}
     *     },
     * @OA\Parameter(
     *          name="responseType",
     *          in="query",
     *          description="Поле с ограниченным набором значений",
     *          required=true,
     *          @OA\Schema(type="string", enum={"json", "array_mini","showSql"}),
     *          example="json",
     *      ),
     * @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Номер страницы",
     *          @OA\Schema(type="integer", format="int32", default=1),
     *      ),
     *          @OA\Parameter(
     *          name="property[prop1][]",
     *          in="query",
     *          description="Свойства товара",
     *          @OA\Schema(type="array", @OA\Items(type="string"), collectionFormat="multi", default={"val1", "val2"}),
     *      ),
     *          @OA\Parameter(
     *          name="property[prop2][]",
     *          in="query",
     *          description="Свойства товара",
     *          @OA\Schema(type="array", @OA\Items(type="string"), collectionFormat="multi", default={"val1", "val2"}),
     *      ),
     *          @OA\Parameter(
     *          name="property[prop3][]",
     *          in="query",
     *          description="Свойства товара",
     *          @OA\Schema(type="array", @OA\Items(type="string"), collectionFormat="multi", default={"val1", "val2"}),
     *      ),
     *          @OA\Parameter(
     *          name="property[prop4][]",
     *          in="query",
     *          description="Свойства товара",
     *          @OA\Schema(type="array", @OA\Items(type="string"), collectionFormat="multi", default={"val1", "val2"}),
     *      ),
     *
     * @OA\Response(
     *         response=200,
     *         description="Список товаров успешно получен",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Продукт 1"),
     *                 @OA\Property(property="price", type="number", format="float", example=19.99),
     *             ),
     *         ),
     *     ),
     * @OA\Response(
     *         response=401,
     *         description="Неавторизованный доступ",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="error", type="string", example="Требуется авторизация"),
     *         ),
     *     ),
     * )
     *
     * Получение списка товаров
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
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
//            ->addSelect('id')
        ;
        if ($request->input('responseType') == 'showSql') {
            return response()->json(
                $products0->toSql()
            );
        } else {
            if ($request->input('responseType') == 'array_mini') {
                return $this->typeMiniResponse($products0->get());
            } else {
                return response()->json(ProductResource::collection($products0->paginate(40)));
            }
        }
    }


    public function typeMiniResponse($data)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Product $product)
    {
        //
    }
}
