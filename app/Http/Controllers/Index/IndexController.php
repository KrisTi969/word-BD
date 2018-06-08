<?php

namespace App\Http\Controllers\Index;
use App\Product;
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

        $products_ar = DB::table('products')->where('ar_ready',0)->orderBy('created_at','desc')->take(8)->get();
        $images_ar = DB::table('prod_images')->get();
        /*B::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->paginate(16);*/
        return view('layouts.index',['products_ar'=>$products_ar])->with(['images_ar'=>$images_ar]);
    }
}
