<?php


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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin.dashboard');
  Route::resource('/news', \App\Http\Controllers\Admin\NewsController::class);
});

Route::resource('/feedback', \App\Http\Controllers\FeedbackController::class);
