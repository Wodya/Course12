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
Route::get('/info', function () {
    return view('info');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/news/category',[\App\Http\Controllers\NewsController::class,'index'])->name("category.list");
Route::get('/news/category/{id}',[\App\Http\Controllers\NewsController::class,'news'])->where('id','\d+')->name("category.news");
Route::get('/news/news/{id}',[\App\Http\Controllers\NewsController::class,'newsInfo'])->where('id','\d+')->name("category.news.info");
