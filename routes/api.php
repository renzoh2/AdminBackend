<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//For Authentication
Route::post("/login", [AuthController::class, 'loginAccount']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logoutAccount']);

//Products
Route::middleware('auth:sanctum')->prefix('/products')->group(function(){
    Route::get('/',[ProductsController::class, "getData"]);
    Route::get('/{id}',[ProductsController::class, "showData"]);
    Route::post('/',[ProductsController::class, "createData"]);
    Route::put('/{id}',[ProductsController::class, "updateData"]);
    Route::delete('/{id}',[ProductsController::class, "deleteData"]);
});

