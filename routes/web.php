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
/*Route::group(array('middleware' => 'forceSSL'), function() {*/
Route::post('/ar', 'Ar\AugmentedRealityController@index')->name('Augmented-Reality');
/*});*/
Route::get('/checkout', 'Order\OrderController@index')->name('checkout');

Route::post('/newOrder', 'Order\OrderController@newOrder')->name('newOrder');

Route::post('/addReview', 'Product\ProductController@addReview');

Route::get('/AccountCart', 'Cart\CartController@index')->name('seeCart');
Route::get('/Account', 'Account\AccountController@index')->name('Account');
Route::get('/Orders', 'Account\AccountController@orderIndex')->name('Orders');
Route::get('/reviews', 'Account\AccountController@reviewsIndex')->name('Reviews');


Route::get('/cart/{id}', 'Cart\CartController@addToCart')->name('cart');
Route::get('/removeItem/{id}','Cart\CartController@removeItem')->name('remove');



Route::get('/', 'Index\IndexController@index')->name('/');

Route::post('/search', 'Api\SearchController@addToCart')->name('search');
Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

////

Route::get('/Product/{id}', 'Product\ProductController@findProduct')->name('product');

Route::post('/grocery/post', 'GroceryController@store');
Route::post('/register/post', 'Auth\RegisterController@store');
Route::post('/edit/contact', 'Account\AccountController@editContact')->name('editContact');

Route::post('/login/check', 'Auth\LoginController@loginCheck');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@email_verification');

/**/

Route::get('/products', 'Product\AllProducts@getProducts')->name('Electronic-Appliances');
Route::get('/products/new', 'Product\AllProducts@getProductsWithFilterNew')->name('Electronic-Appliances-New');
Route::get('/products/lowest-price', 'Product\AllProducts@getProductsWithFilterLowPrice')->name('Electronic-Appliances-Low-Price');
Route::get('/products/high-price', 'Product\AllProducts@getProductsWithFilterHighPrice')->name('Electronic-Appliances-High-Price');
Route::get('/products/best-rating', 'Product\AllProducts@getProductsWithFilterBestRating')->name('Electronic-Appliances-Best-Rating');

/**/
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


