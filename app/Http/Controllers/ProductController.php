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
     *          name="page",
     *          in="query",
     *          description="Номер страницы",
     *          @OA\Schema(type="integer", format="int32", default=1),
     *      ),
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::with('properties')->paginate(40));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
