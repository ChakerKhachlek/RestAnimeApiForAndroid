<?php

use App\Models\User;
use App\Models\Anime;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

//returns the last 4 added animes
Route::get('animes/latest', function () {
    return Anime::latest()->take(6)->get();
});

//returns the top 4 rated animes
Route::get('animes/rated', function () {
    return Anime::orderBy('rating', 'desc')->take(6)->get();
});

//returns all categories with their animes
Route::get('animes/data', function () {
    return Category::with('animes')->get();
});

//returns all categories only
Route::get('categories', function () {
    return Category::all();
});

//returns category animes
Route::get('category/{id}', function ($id) {
    return Category::find($id)->animes()->get();
});

//create user and return user else it returns a fake user with username = error
Route::post('user/register', [UserController::class, 'register']);

//create user and return user else it returns a fake user with username = error
Route::post('user/register', [UserController::class, 'register']);

//return true or false 
Route::post('user/login', [UserController::class, 'login']);


//returns user
Route::get('user/find/{id}', function ($id) {
    return User::findOrFail($id);
});


//return true or false 
Route::post('user/updateInfo/{id}', [UserController::class, 'updateInfo']);

//return true or false 
Route::post('user/updatePassword/{id}', [UserController::class, 'updatePassword']);







