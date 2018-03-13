<?php

function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                $level--;
                $ends_line_level = NULL;
                $new_line_level = $level;
                break;

                case '{': case '[':
                $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                $char = "";
                $ends_line_level = $new_line_level;
                $new_line_level = NULL;
                break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}

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

Route::get('/testProduct/{id}', 'Product\ProductController@findProduct')->name('product');


Route::post('/grocery/post', 'GroceryController@store');
Route::post('/register/post', 'Auth\RegisterController@store');
Route::post('/login/check', 'Auth\LoginController@loginCheck');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@email_verification');
Route::get('/products', 'Product\AllProducts@getProducts')->name('Electronic-Appliances');
Route::get('/TVs', 'Product\AllProducts@getTVs')->name('TVs');
////




/*
 * Controller based Routes :) */

Route::get('json', function () {
    $arr = array('Tip' => 'Telefon', 'Pret' => 2, 'data' => 3);
      //var_dump($arr);



    $json = '
{
    "type": "donut",
    "name": "Cake",
    "toppings": [
        { "id": "5002", "type": "Glazed" },
        { "id": "5006", "type": "Chocolate with Sprinkles" },
        { "id": "5004", "type": "Maple" }
    ]
}';
    $osi = '{"physical":"cables","data link":"mac address","network":"ip address","transport":"tcp","session":"application connections","presentation":"translation","application":"email"}';
    $osi = json_decode($osi);

    foreach ($osi as $key => $value){
        echo $key.' => '.$value.'<br>';
    }


    $json = json_encode(array(
        "client" => array(
            "build" => "1.0",
            "name" => "xxxxxx",
            "version" => "1.0"
        ),
        "protocolVersion" => 4,
        "data" => array(
            "distributorId" => "xxxx",
            "distributorPin" => "xxxx",
            "locale" => "en-US"
        )
    ));
    var_dump($json);
    $deco = json_decode($json);
    foreach ($deco as $key => $value){
        echo $key.' => '.$value.'<br>';
    }
});

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


