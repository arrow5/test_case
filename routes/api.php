<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'admin','where' => ['id' => '[0-9]+']],function (){

    Route::group(['prefix' => 'clients'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\ClientController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\ClientController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\ClientController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\ClientController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\ClientController::class,'destroy']);
   });

    Route::group(['prefix' => 'currencies'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\CurrencyController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\CurrencyController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\CurrencyController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\CurrencyController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\CurrencyController::class,'destroy']);
   });

    Route::group(['prefix' => 'customerorders'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\CustomerOrderController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\CustomerOrderController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\CustomerOrderController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\CustomerOrderController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\CustomerOrderController::class,'destroy']);
   });

    Route::group(['prefix' => 'deliverytypes'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\DeliveryTypeController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\DeliveryTypeController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\DeliveryTypeController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\DeliveryTypeController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\DeliveryTypeController::class,'destroy']);
   });

    Route::group(['prefix' => 'goods'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\GoodController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\GoodController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\GoodController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\GoodController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\GoodController::class,'destroy']);
   });

    Route::group(['prefix' => 'paymenttypes'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\PaymentTypeController::class,'index']);
       Route::get('/show/{id}',[\App\Http\Controllers\Admin\PaymentTypeController::class,'show']);
       Route::post('/store',[\App\Http\Controllers\Admin\PaymentTypeController::class,'store']);
       Route::put('/update/{id}',[\App\Http\Controllers\Admin\PaymentTypeController::class,'update']);
       Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\PaymentTypeController::class,'destroy']);
   });


});
