<?php

use App\Http\Controllers\NewsController;
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
Route::get('/info', function () {
    return view('info');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/news', function () {
    return view('news');
});
Route::group(['prefix' => 'news'], function() {
    Route::get('/category', [NewsController::class, 'index'])->name("news.category.list");
    Route::get('/category/{id}', [NewsController::class, 'news'])->where('id', '\d+')->name("news.category");
    Route::get('/news/{id}', [NewsController::class, 'newsInfo'])->where('id', '\d+')->name("news.category.info");
});
