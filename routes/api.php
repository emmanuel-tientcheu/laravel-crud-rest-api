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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products',productController::class);
/*Route::get('tot',[productController::class,'index']);
Route::get('tot/{id}',[productController::class,'show']);*/
Route::post('findProduct',[productController::class,'find']);

Route::group(['prefix' => 'product' , 'namespace' => 'App\Http\Controllers\productController' ],function(){
    Route::resource('prefixProduct',productController::class);
});

Route::group(['prefix'=>'productImport' , 'namespace' =>'App\Http\Controllers\productController' ],function(){
    include __DIR__ . "\api\V1.php";
});