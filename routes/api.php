<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
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
// cors middleware to control  the endpoint response
Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::apiResource('products', productController::class)->middleware('throttle:20,1');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
});
