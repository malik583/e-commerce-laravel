<?php

use Illuminate\Http\Request;

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

Route::middleware(['auth:api','cors'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addProduct','ProductApiController@addProduct');

Route::get('/products','ProductApiController@homePage')->middleware('cors');

Route::get('/product-details/{id}','ProductApiController@showProductById')->middleware('cors');

Route::get('/search/{query}','ProductApiController@searchProducts')->middleware('cors');

Route::get('/suggest/{query}','ProductApiController@suggestProducts')->middleware('cors');	

// Route::middleware('cors')->group(function(){
// 	return Route::get('/products','ProductApiController@homePage');
// });



/* Below routes are for Testing Purpose */
// Route::post('/student','ApiController@addStudent');

// Route::get('/student','ApiController@showStudent');

// Route::get('/student/{id}','ApiController@showStudentById');