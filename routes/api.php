<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/products', [ \App\Http\Controllers\ApiController::class,'getProducts'] );
});
