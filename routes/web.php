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

//Admin Routes

Route::get('/uploadfile','Admin\AdminController@show');
Route::post('/uploadfile/{title}','Admin\AdminController@uploadFiles')->name('try');
Route::post('/modifyPicture/{title}','Admin\AdminController@uploadFilesAndModify')->name('uploadAndModify');
Route::post('/uploadGLTF/{title}','Admin\AdminController@uploadGltfFile')->name('GLTF');


Route::group(['middleware' => 'admin'], function () {
    //
    Route::get('/Admin', 'Admin\AdminController@index')->name('Admin');
    Route::get('/Admin/newUser', 'Admin\AdminController@newUSer')->name('Admin-newUser');
    Route::post('/Admin/addUser', 'Admin\AdminController@store');
    Route::get('/Admin/userList/', 'Admin\AdminController@userList')->name('Admin-userList');
    Route::post('/Admin/editUser', 'Admin\AdminController@editContactByAdmin')->name('Admin-editUser');
    Route::post('/Admin/deleteUser', 'Admin\AdminController@deleteUser')->name('Admin-deleteUser');
    Route::get('/Admin/commentList', 'Admin\AdminController@showUncheckedComments')->name('Admin-UncheckedComments');
    Route::post('/Admin/commentList', 'Admin\AdminController@showUncheckedComments')->name('Admin-UncheckedUsersPost');
    Route::post('/Admin/removeComment', 'Admin\AdminController@deleteComment')->name('Admin-deleteComment');
    Route::get('Admin/refreshComments','Admin\AdminController@refreshComments')->name('Admin-refreshComments');
    Route::post('Admin/approveComment','Admin\AdminController@approveComment')->name('Admin-approveComment');
    Route::get('Admin/addProduct','Admin\AdminController@newProduct')->name('Admin-addProduct');
    Route::post('Admin/storeProduct','Admin\AdminController@storeProduct')->name('Admin-storeProduct');
    Route::post('/Admin/deleteProduct', 'Admin\AdminController@deleteProduct')->name('Admin-deleteProduct');
    Route::get('/Admin/productList','Admin\AdminController@productList')->name('Admin-productList');
    Route::post('/Admin/updateProduct','Admin\AdminController@updateProduct')->name('Admin-updateProduct');
    Route::get('/Admin/updateProductImages','Admin\AdminController@productList')->name('Admin-UpdateProductImages');
    Route::post('/Admin/getProductImages', 'Admin\AdminController@getProductImages')->name('Admin-getProductImages');
    Route::get('/Admin/getPendingOrders','Admin\AdminController@showPendingOrders')->name('Admin-PendingOrders');
    Route::post('Admin/approveOrder','Admin\AdminController@approveOrder')->name('Admin-approveOrder');
    Route::get('/Admin/refreshOrders','Admin\AdminController@refreshPendingOrders')->name('Admin-RefreshPendingOrders');
    Route::post('/Admin/removeOrder', 'Admin\AdminController@deleteOrder')->name('Admin-removeOrder');
    Route::get('/Admin/getProductsAR','Admin\AdminController@productList')->name('Admin-productListAR');
});

Route::group(['middleware' => 'web'], function () {

/*Route::group(array('middleware' => 'forceSSL'), function() {*/
Route::post('/ar/{filename}', 'Ar\AugmentedRealityController@index')->name('Augmented-Reality');
/*});*/
Route::get('/checkout', 'Order\OrderController@index')->name('checkout');

Route::post('/newOrder', 'Order\OrderController@newOrder')->name('newOrder');
Route::post('/verifyOrder','Order\OrderController@verifyOrder')->name('verifyOrder');
Route::post('/verifyOrderStep2','Order\OrderController@verifyOrder2')->name('verifyOrder2');

Route::get('/deleteCart','Order\OrderController@deleteCart')->name('deleteCart');

Route::post('/addReview', 'Product\ProductController@addReview');

Route::get('/AccountCart', 'Cart\CartController@index')->name('seeCart');
Route::get('/Account', 'Account\AccountController@index')->name('Account');
Route::get('/Orders', 'Account\AccountController@orderIndex')->name('Orders');
Route::post('/SaveWishlist', 'Account\AccountController@saveWishlist')->name('Wishlist');
Route::get('/get-wishlists', 'Account\AccountController@getWishlists')->name('getWishlists');
Route::get('/reviews', 'Account\AccountController@reviewsIndex')->name('Reviews');


Route::get('/cart/{id}', 'Cart\CartController@addToCart')->name('cart');
Route::get('/removeItem/{id}','Cart\CartController@removeItem')->name('remove');
Route::post('/updateItem/','Cart\CartController@updateProductQty')->name('updateCart');


Route::get('/', 'Index\IndexController@index')->name('/');

Route::get('/home', 'Index\IndexController@index2')->name('fromOrder');

Route::get('/search/{search?}', 'Api\SearchController@search')->name('search');
Route::get('/search-param/new/{search?}', 'Product\AllProducts@getAllProductsWithFilterNew')->name('All-Products-New');
Route::get('/search-param/most-popular/{search?}', 'Product\AllProducts@getAllProductsWithFilterPopular')->name('All-Products-Most-Popular');
Route::get('/search-param/lowest-price/{search?}', 'Product\AllProducts@getAllProductsWithFilterPriceLow')->name('All-Products-Low-Price');
Route::get('/search-param/high-price/{search?}', 'Product\AllProducts@getAllProductsWithFilterPriceHigh')->name('All-Products-High-Price');
Route::get('/search-param/best-rating/{search?}', 'Product\AllProducts@getAllProductsWithFilterRating')->name('All-Products-Best-Rating');
Route::auth();

/*Route::get('/home', 'HomeController@index')->name('home');*/

////

Route::get('/Product/{id}', 'Product\ProductController@findProduct')->name('product');

Route::post('/grocery/post', 'GroceryController@store');
Route::post('/register/post', 'Auth\RegisterController@store');
Route::post('/edit/contact', 'Account\AccountController@editContact')->name('editContact');

Route::post('/login/check', 'Auth\LoginController@loginCheck');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@email_verification');

/**/

Route::get('/Electronic-Appliances/', 'Product\AllProducts@getProducts')->name('Electronic-Appliances');
Route::get('/Electronic-Appliances/new', 'Product\AllProducts@getProductsWithFilterNew')->name('Electronic-Appliances-New');
Route::get('/Electronic-Appliances/most-popular', 'Product\AllProducts@getProductsWithFilterMostPopular')->name('Electronic-Appliances-Most-Popular');
Route::get('/Electronic-Appliances/lowest-price', 'Product\AllProducts@getProductsWithFilterLowPrice')->name('Electronic-Appliances-Low-Price');
Route::get('/Electronic-Appliances/high-price', 'Product\AllProducts@getProductsWithFilterHighPrice')->name('Electronic-Appliances-High-Price');
Route::get('/Electronic-Appliances/best-rating', 'Product\AllProducts@getProductsWithFilterBestRating')->name('Electronic-Appliances-Best-Rating');

Route::get('/Computers-and-Accesories/', 'Product\AllProducts@getProductsComputers')->name('Computers-and-Accesories');
Route::get('/Computers-and-Accesories/new', 'Product\AllProducts@getProductsWithFilterNew')->name('Computers-and-Accesories-New');
Route::get('/Computers-and-Accesories/most-popular', 'Product\AllProducts@getProductsWithFilterMostPopular')->name('Computers-and-Accesories-Most-Popular');
Route::get('/Computers-and-Accesories/lowest-price', 'Product\AllProducts@getProductsWithFilterLowPrice')->name('Computers-and-Accesories-Low-Price');
Route::get('/Computers-and-Accesories/high-price', 'Product\AllProducts@getProductsWithFilterHighPrice')->name('Computers-and-Accesories-High-Price');
Route::get('/Computers-and-Accesories/best-rating', 'Product\AllProducts@getProductsWithFilterBestRating')->name('Computers-and-Accesories-Best-Rating');

Route::get('/Entertainment/', 'Product\AllProducts@getEntertainment')->name('Entertainment');
    Route::get('/Entertainment/new', 'Product\AllProducts@getProductsWithFilterNew')->name('Entertainment-New');
    Route::get('/Entertainment/most-popular', 'Product\AllProducts@getProductsWithFilterMostPopular')->name('Entertainment-Most-Popular');
    Route::get('/Entertainment/lowest-price', 'Product\AllProducts@getProductsWithFilterLowPrice')->name('Entertainment-Low-Price');
    Route::get('/Entertainment/high-price', 'Product\AllProducts@getProductsWithFilterHighPrice')->name('Entertainment-High-Price');
    Route::get('/Entertainment/best-rating', 'Product\AllProducts@getProductsWithFilterBestRating')->name('Entertainment-Best-Rating');


/**/
    // FILTRARI PRODUSE
Route::get('/TVs', 'Product\AllProducts@getTVs')->name('TVs');
Route::get('/Cameras-Photo-Video', 'Product\AllProducts@getCamerasPhotosVideos')->name('Cameras');
Route::get('/Smartphones-Accesories', 'Product\AllProducts@getSmartphones')->name('Smartphones');
Route::get('/Monitors', 'Product\AllProducts@getMonitors')->name('Monitors');
Route::get('/Printers', 'Product\AllProducts@getPrinters')->name('Printers');
Route::get('/Laptops', 'Product\AllProducts@getLaptops')->name('Laptops');
Route::get('/Movies', 'Product\AllProducts@getMoviews')->name('Movies');
Route::get('/Games', 'Product\AllProducts@getGames')->name('Games');
Route::get('/Music', 'Product\AllProducts@getMusic')->name('Music');

////
Route::get("/autocomplete",array('as'=>'autocomplete','uses'=> 'Api\SearchController@autocomplete'));
});
/*
 * Controller based Routes :) */




