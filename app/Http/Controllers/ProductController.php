<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Service\ProductServiceController;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     operationId="getProducts",
     *     tags={"Продукты"},
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
        $products0 = ProductServiceController::getProduct($request);
        return ProductServiceController::response($products0, $request->input('responseType', null));
    }

}
