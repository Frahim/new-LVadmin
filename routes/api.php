<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BannerController;


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


Route::controller(App\Http\Controllers\Api\BannerController::class)->group(function(){
    Route::get('banner', 'index');   
});

Route::controller(App\Http\Controllers\Api\BrandsController::class)->group(function(){
    Route::get('brands', 'index');   
});

Route::controller(App\Http\Controllers\Api\CategoryController::class)->group(function(){
    Route::get('category', 'index');   
});

Route::controller(App\Http\Controllers\Api\ProductController::class)->group(function(){
    Route::get('products', 'index');   
});
Route::controller(App\Http\Controllers\Api\ProductImageController::class)->group(function(){
    Route::get('product-image', 'index');   
});
Route::controller(App\Http\Controllers\Api\Highlighters::class)->group(function(){
    Route::get('highlighter', 'index');   
});



