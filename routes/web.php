<?php

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

//Route::get('units_test', 'dataimportcontroller@importunits');

Route::get('tag_test', function () {
    $tag = \App\role::find(2);
    return $tag->users;
});


Route::get('users', function () {
    return \App\User::paginate();
});

Route::get('products', function () {
    return \App\product::with('images')->paginate();
});

Route::get('images', function () {
    return \App\image::paginate();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verified_test', function () {
    return 'welcome';
})->middleware(['user_is_support']);



//units
Route::get('units', 'UnitController@index')->name('units');
Route::post('units', 'UnitController@store');
Route::delete('units', 'UnitController@delete');
//Route::update('units', 'UnitController@update');
Route::post('search_units', 'UnitController@search')->name('search_units');

//categories
Route::get('categories', 'CategoryController@index')->name('categories');
//products
Route::get('products', 'ProductController@index')->name('products');
//tags
Route::get('tags', 'TagController@index')->name('tags');
Route::post('tags', 'TagController@store');

//payments
Route::get('payments', 'PaymentController@index')->name('payments');
//shipments
//orders

//countries
Route::get('countries', 'CountryController@index')->name('countries');
//cities
Route::get('cities', 'CityController@index')->name('cities');
//states
Route::get('states', 'StateController@index')->name('states');

//reviews
Route::get('reviews', 'ReviewController@index')->name('reviews');
//tickets
Route::get('tickets', 'TicketController@index')->name('tickets');

//roles
Route::get('roles', 'RoleController@index')->name('roles');


