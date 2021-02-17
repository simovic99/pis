<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpgController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategorijeController;
use App\Http\Controllers\KorisniciController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('opg', OpgController::class);
Route::resource('kategorije', KategorijeController::class);
Route::resource('product', ProductController::class);
Route::resource('users', KorisniciController::class);
Route::get('product.akcija','App\Http\Controllers\ProductController@akcija')->name('akcija');



require __DIR__.'/auth.php';
