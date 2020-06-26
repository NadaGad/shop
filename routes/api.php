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

//categories
Route::get('categories', 'Api\CategoryController@index');
Route::get('categories/{id}', 'Api\CategoryController@show');
//tags
Route::get('tags', 'Api\TagController@index');
Route::get('tags/{id}', 'Api\TagController@show');
//products
Route::get('products', 'Api\ProductController@index');
Route::get('products/{id}', 'Api\ProductController@show');

//general route
Route::get('countries', 'Api\CountryController@index');
Route::get('countries/{id}/states', 'Api\ProductController@showstates');
Route::get('products/{id}/cities', 'Api\ProductController@showcities');

//
Route::get('users', function (){
    return \App\Http\Resources\UserFullresourse::collection(\App\User::paginate());
});

Route::get('users/{id}', function ($id){
    return new \App\Http\Resources\UserFullresourse(\App\User::find($id));
});

Route::post('addtocart', 'Api\ProductController@addtocart');
Route::get('getcart', 'Api\ProductController@getcart');
Route::get('checkout', 'Api\ProductController@checkout');


//auth
Route::post('auth/register', 'Api\AuthController@register');
Route::post('auth/login', 'Api\AuthController@login');

Route::group(['auth:api'],function(){

});

Route::middleware('auth:api')->group( function () {
    
    Route::post('update_user/{id}', 'Api\AuthController@update');
});
