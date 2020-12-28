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


Route::get('/',[App\Http\Controllers\HomeController::class,'adminView'])->name('admin.view');

Route::view('admin/categories', 'admin.categories.manageCategories')->name('manageCategories');
Route::view('admin/animes', 'admin.animes.manageAnimes')->name('manageAnimes');


