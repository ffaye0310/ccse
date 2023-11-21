<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post("/product",[ProductController::class,'store']);
    
});

Route::post("/product",[ProductController::class,'store']);
Route::get("/product/{id}",[ProductController::class,'show']);

Route::post("/product/{id}",[ProductController::class,'update']);
Route::delete("/product/{id}",[ProductController::class,'destroy']);



Route::get("/products",[ProductController::class,'index']);

Route::get("/categories",[CategoryController::class,'index']);