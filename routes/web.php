<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{any}', function () {
    return view('index');
})->where('any','.*');

Route::prefix('user')->group(function () {
    Route::view('/blog', 'user.blog');

});
Route::prefix('user')->group(function () {
    Route::view('/blog', 'user.blog');

});
Route::prefix('user')->group(function () {
    Route::get('/blog', function () {
        // Matches The "/admin/users" URL
    });
});

Route::view('/get','get.index');
Route::view('/get','get.index');
Route::view('/get','get.index');
Route::view('/get','get.index');
Route::view('/get','get.index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('{page}', MainController::class)->where('page','.*');

