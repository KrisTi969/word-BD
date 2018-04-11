<?php

namespace App\Http\Controllers\Index;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Cart;

class IndexController extends Controller
{

    public function __construct()
    {
    }

    public function index(){
        //verificam daca userul logat are cart salvat in
        if(\Auth::check()) {
            $id = \Auth::user()->id;//id ul lui
            //cautam cartul dupa id'ul utilizatorului logat
           $cartIdentifier = DB::table('shoppingcart')->select('identifier')->where('identifier','=',$id)->first();
          // var_dump($cartIdentifier->identifier);
           if($cartIdentifier!=NULL) { //daca gasim un shopping cart la userul logat
                \Cart::instance('default')->restore($cartIdentifier->identifier);
             //   var_dump("daada");
           }
        }
        return view('layouts.index');
    }
}
