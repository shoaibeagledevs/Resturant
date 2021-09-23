<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResturantController;
use App\Http\Controllers\Api\MenuController;

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

/*
|--------------------------------------------------------------------------
| Resturant Routes
|--------------------------------------------------------------------------
*/

Route::get('/resturants/getAllResturants',[ResturantController::class,'index']);
Route::post('/resturants/createrestaurant',[ResturantController::class,'store']);
Route::get('/resturants/{id}/menu',[MenuController::class,'getMenusByResturantId']);
Route::post('/resturants/{id}/menu',[MenuController::class,'createMenu']);



/*
|--------------------------------------------------------------------------
| No Route Match
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    response()->json(['status' => false, 'ErorrCode' => 404, 'errors' => ['Route does not exist']],404);
    // return sendResponse(false,404,['Route does not exist'],404);
});