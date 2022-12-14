<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DeleteData;
use App\Http\Controllers\searchController;
use App\Http\Controllers\Updatecontroller;



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
Route::get("getApi",[ApiController::class,'getApi']);
Route::post("create",[ApiController::class,'create']);
Route::post("update",[Updatecontroller::class,'update']);
Route::post("delete",[DeleteData::class,'delete']);
Route::post("search",[searchController::class,'search']);
//Route::post("validdata",[ApiController::class,'validdata']);