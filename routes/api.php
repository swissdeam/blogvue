<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowPostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\AuthController;


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



Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::resource('posts', PostController::class); //Users Posts

    Route::get('/user/home', UserController::class); //Personal info
    Route::get('/feed', [ShowPostsController::class, 'feedPosts']); // feed department
    Route::get('/user/search/{email}/posts', [ShowPostsController::class, 'searchUsers']); //search department


    Route::group(['middleware' => 'admin'], function () {
        Route::delete('/admin/{user_id}/posts/{post_id}', [AdminController::class, 'deletePost']);
        Route::delete('/admin/{user_id}', [AdminController::class, 'deleteUser']);
        Route::get('/admin/{user_id}/posts', [AdminController::class, 'showPosts']);
        Route::get('/admin', [AdminController::class, 'showUsers']);
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/user/login', [AuthController::class, 'login']);
Route::post('/user/register', [AuthController::class, 'register']);



