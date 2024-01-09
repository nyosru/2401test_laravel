<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 *  @OA\Schema(
 *      schema="Product",
 *      type="object",
 *      properties={
 *          @OA\Property(property="id", type="integer", format="int64"),
 *          @OA\Property(property="name", type="string"),
 *          @OA\Property(property="price", type="number", format="double"),
 *          @OA\Property(property="quantity", type="integer", format="int32"),
 *          @OA\Property(
 *              property="options",
 *              type="array",
 *              @OA\Items(ref="#/components/schemas/ProductOption")
 *          ),
 *      }
 *  )
 * /
 *
 * @OA\Schema(
 *      schema="ProductOption",
 *      type="object",
 *      properties={
 *          @OA\Property(property="name", type="string"),
 *      }
 *  )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
