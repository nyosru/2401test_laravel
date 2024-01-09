<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{



    public function getProducts()
    {
//        $this->middleware('auth:api');

        // Ваша логика получения списка товаров здесь

        // Возвращаем успешный ответ с массивом товаров
        $products = [
            ['id' => 1, 'name' => 'Продукт 1', 'price' => 19.99],
            ['id' => 2, 'name' => 'Продукт 2', 'price' => 29.99],
            // Дополнительные товары...
        ];

        return response()->json($products, 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @OA\Get(
     *     path="/",
     *     operationId="getHome",
     *     tags={"Home"},
     *     summary="Get home data",
     *     description="Get data from the home endpoint.",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Welcome to the API!"),
     *         ),
     *     ),
     * )
     */
    public function getHome()
    {
        // Your code here
    }

    /**
     * @OA\Post(
     *     path="/add",
     *     operationId="addItem",
     *     tags={"Item"},
     *     summary="Add an item",
     *     description="Add an item to the system.",
     *     security={
     *            {"bearerAuth": {}}
     *        },
     *     @OA\Response(
     *         response=201,
     *         description="Item added successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Item added successfully"),
     *         ),
     *     ),
     * )
     */
    public function addItem(Request $request)
    {
        // Your code here
    }

    /**
     * @OA\Post(
     *     path="/find",
     *     operationId="findItem",
     *     tags={"Item"},
     *     summary="Find an item",
     *     description="Find an item in the system.",
     *     @OA\Response(
     *         response=200,
     *         description="Item found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Item found"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Item not found"),
     *         ),
     *     ),
     * )
     */
    public function findItem(Request $request)
    {
        // Your code here
    }

    /**
     * @OA\Delete(
     *     path="/item/{id}",
     *     operationId="deleteItem",
     *     tags={"Item"},
     *     summary="Delete an item",
     *     description="Delete an item from the system.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the item to be deleted",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Item deleted successfully"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Item not found"),
     *         ),
     *     ),
     * )
     */
    public function deleteItem($id)
    {
        // Your code here
    }
}
