<?php

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

Route::get('user', 'Api\UserController@index');
Route::get('user/{user}', 'Api\UserController@show');
Route::put('user/{user}', 'Api\UserController@update');
Route::get('post', 'Api\PostController@index');
Route::get('post/category={id}', 'Api\PostController@getCategory');
Route::get('post/type={type}', 'Api\PostController@getType');
Route::get('post/author={author}', 'Api\PostController@getAuthor');
Route::post('payment/{user}',  'PaymentController@index');
Route::post('notif/payment',  'PaymentController@notification');