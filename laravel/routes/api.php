<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\UsersController;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//------------News----------------
//List news
Route::get('news',[NewsController::class,'index']);

//List single news
Route::get('news/{id}',[NewsController::class,'show']);

//Create new news
Route::post('news',[NewsController::class,'store']);

//Update news
Route::put('news/{id}',[NewsController::class,'update']);

//Delete single news
Route::delete('news/{id}',[NewsController::class,'destroy']);



//------------User----------------
//List news
Route::get('user',[UsersController::class,'index']);

//List single user
Route::get('user/{id}',[UsersController::class,'show']);

//Create new user
Route::post('user',[UsersController::class,'store']);

//Update user
Route::put('user/{id}',[UsersController::class,'update']);

//Delete single user
Route::delete('user/{id}',[UsersController::class,'destroy']);