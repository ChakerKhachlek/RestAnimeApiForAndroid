<?php

use App\Models\Anime;
use App\Models\Category;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('animes/latest', function () {
    return Anime::latest()->take(6)->get();
});

Route::get('animes/rated', function () {
    return Anime::orderBy('rating', 'desc')->take(6)->get();
});

Route::get('data', function () {
    return Category::with('animes')->get();
});

Route::get('categories', function () {
    return Category::all();
});

Route::get('animes', function () {
    return Anime::all();
});

Route::get('category/{id}', function ($id) {
    return Category::find($id)->animes()->get();
});



