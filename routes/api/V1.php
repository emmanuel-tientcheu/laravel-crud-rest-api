<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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



Route::resource('products',productController::class);
/*Route::get('tot',[productController::class,'index']);
Route::get('tot/{id}',[productController::class,'show']);*/
Route::post('findProduct',[productController::class,'find']);

