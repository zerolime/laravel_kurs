<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\News;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Home::class, 'index'])->name('home');

Route::get('/about', function(){
    return view('about');
});

Route::prefix('news')->group(function (){

    Route::get('/', [News\NewsController::class, 'showAll'])
    ->name('all');

    Route::get('/view/{id}', [News\NewsController::class, 'showDetail'])
        ->where('id', '[0-9]+')
        ->name('detail');

    Route::get('/slugs/',[News\CategoryController::class, 'showAll'])
        ->name('slugs');

    Route::get('/slug/{slug}',[News\CategoryController::class, 'showBySlug'])
        ->name('slug');

});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
