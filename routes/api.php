<?php

use App\Http\Controllers\GetController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Person\AdminController;
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

//Route::middleware('auth:sanctum')->group( function () {
//    Route::get('/user', AuthController::class);
//});

Route::middleware('auth:sanctum')->post('/user/login', function (Request $request){
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/user/register', function (Request $request){
    return $request->user();
});

Route::get('/test', function () {
    return response() -> json(['message' => 'good'], 200);
});

//Route::post('/sanctum/csrf-cookie', TokenController::class);


Route::group(['middleware'=>'auth:sanctum'], function(){
    Route::get('/get', GetController::class);
});

Route::group(['namespace'=>'App\Http\Controllers\Person'], function(){
    Route::get('/admin', 'AdminController');
});
