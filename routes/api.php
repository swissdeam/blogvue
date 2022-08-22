<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ShowPostsController;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\Person\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthManager;
use \App\Models\Post;


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

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::get('/admin/check', function (Request $request){
        return $request->user()->is_admin;
    });
    Route::get('/user/home', function (Request $request){
        return $request->user();
    });
    Route::post('/user/blog/create-post', [CreatePostController::class, 'creating']);
    Route::get('/user/blog', ShowPostsController::class);
    Route::get('/feed', [ShowPostsController::class, 'feedPosts']);
    //Route::get('/feed/{user_id}/post-owner', [ShowPostsController::class, 'feedUsers']);
    Route::get('/admin/{user_id}/posts', [ShowPostsController::class, 'showForAdmin']);
    Route::get('/user/search/{email}/posts', [ShowPostsController::class, 'searchUsers']);
    Route::delete('/user/blog/{post_id}', function ($post_id){
        Post::where('id', $post_id)->delete();
        return response()->json(["status"=>"success"], 200);
    });
    Route::delete('/admin/{user_id}/posts/{post_id}', function ($user_id, $post_id){
        Post::where('id', $post_id)->delete();
        return response()->json(["status"=>"success"], 200);
    });
    Route::delete('/admin/{user_id}', function ($user_id){
        User::where('id', $user_id)->delete();
        return response()->json(["status"=>"success"], 200);
    });

});


    Route::post('/user/login',  [AuthController::Class, 'login']);
    Route::post('/user/register',  [AuthController::Class, 'register']);

//Route::get('/admin/check', function (Request $request){
//    return $request->user();
//});

Route::get('/test', function () {
    return response() -> json(['message' => 'good'], 200);
});
Route::post('/logout', function () {
    return response() -> json(['message' => 'logout'], 200);
});

Route::post('/sanctum/token', TokenController::class);


Route::group(['middleware'=>'loginReq:sanctum'], function(){
    Route::get('/get', GetController::class);
});

Route::group(['namespace'=>'App\Http\Controllers\Person'], function(){
    Route::get('/admin', 'AdminController');
});
