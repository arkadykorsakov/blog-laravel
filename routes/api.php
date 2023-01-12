<?php

use App\Http\Controllers\AuthController;
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


Route::group([
	'middleware' => 'api',
	'prefix' => 'auth'
], function ($router) {
	Route::post('login', [AuthController::class, 'login']);
	Route::post('logout', [AuthController::class, 'logout']);
	Route::post('refresh', [AuthController::class, 'refresh']);
});


Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix' => 'users', 'middleware' => 'api',], function () {
	Route::post("/", "StoreController");
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::get("/{user}", "ShowController");
		Route::patch("/{user}", "UpdateController");
		Route::delete("/{user}", "DeleteController");
	});
});


Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories', 'middleware' => 'api',], function () {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::get("/", "IndexController");
		Route::post("/", "StoreController");
		Route::get("/{category}", "ShowController");
		Route::patch("/{category}", "UpdateController");
		Route::delete("/{category}", "DeleteController");
	});
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts', 'middleware' => 'api',], function () {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::get("/", "IndexController");
		Route::post("/", "StoreController");
		Route::get("/{post}", "ShowController");
		Route::patch("/{post}", "UpdateController");
		Route::delete("/{post}", "DeleteController");
	});
});

Route::group(['namespace' => 'App\Http\Controllers\Comment', 'prefix' => 'comments', 'middleware' => 'api',], function () {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::post("/", "StoreController");
		Route::patch("/{comment}", "UpdateController");
		Route::delete("/{comment}", "DeleteController");
	});
});


Route::group(['namespace' => 'App\Http\Controllers\Like', 'prefix' => 'likes', 'middleware' => 'api',], function () {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::post("/{post}", "StoreController");
		Route::delete("/{post}", "DeleteController");
	});
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => 'api',], function () {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::get("/", "IndexController");
	});
});
