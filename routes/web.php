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

Route::get('/', function () {
   return view('layouts.index');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

////
Route::view('/grocery', 'ajax');
Route::post('/grocery/post', 'GroceryController@store');
Route::post('/register/post', 'Auth\RegisterController@store');

////




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


