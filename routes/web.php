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

Route::post('/addReview', 'Product\ProductController@addReview');

Route::get('/AccountCart', 'Cart\CartController@index')->name('seeCart');
Route::get('/cart/{id}', 'Cart\CartController@addToCart')->name('cart');
Route::get('/removeItem/{id}','Cart\CartController@removeItem')->name('remove');



Route::get('/', 'Index\IndexController@index')->name('/');

Route::post('/search', 'Api\SearchController@addToCart')->name('search');
Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

////
Route::view('/grocery', 'ajax');

Route::get('/Product/{id}', 'Product\ProductController@findProduct')->name('product');


Route::post('/grocery/post', 'GroceryController@store');
Route::post('/register/post', 'Auth\RegisterController@store');
Route::post('/login/check', 'Auth\LoginController@loginCheck');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@email_verification');
Route::get('/products', 'Product\AllProducts@getProducts')->name('Electronic-Appliances');
Route::get('/TVs', 'Product\AllProducts@getTVs')->name('TVs');
////

Route::get('user/{name?}/{type?}', function ($name = 'John', $type = 'ceva') {
    return $name. "". $type;
});

Route::get("/autocomplete",array('as'=>'autocomplete','uses'=> 'Api\SearchController@autocomplete'));

/*
 * Controller based Routes :) */

Route::get('salve', function() {
   return view('test');
});

Route::get('ID/{id}', function ($id) {
    echo 'ID: '.$id;
});

Route::get('/user/{name?}',function($name = 'Borat'){ // OPTIONAL PARAMETER
    echo "Name: ".$name;
});

Route::get('role',[
    'middleware' => 'Role:editor',
    'uses' => 'TestController@index',
]);

Route::get('terminate',[
    'middleware' => 'terminate',
    'uses' => 'ABCController@index',
]);

Route::get('/usercontroller/path',[
    'middleware' => 'First',
    'uses' => 'UserController@showPath'
]);


