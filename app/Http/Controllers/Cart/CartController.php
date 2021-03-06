<?php

namespace App\Http\Controllers\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use DB;
use App\User;
use Response;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        // only these people can acces the page
        //  $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(){
        if(Auth::check()) {
            return view('account.account_cart');
        }
        else {
            return view('account.account_cart');
        }
    }

    public function updateProductQty(Request $request)
    {

        //cand nu este logat
        //cand nu este logat
        if ($request->id) {
            \Cart::remove($request->id);
            if (Auth::check()) {
                $id = \Auth::user()->id;//id'ul lui
                $cartIdentifier = DB::table('shoppingcart')->select('identifier')->where('identifier', '=', 1)->first();
                if ($cartIdentifier) {
                    //exista deja, trebuie updatat
                    DB::table('shoppingcart')->where('identifier', $cartIdentifier->identifier)->delete();//stergem
                    \Cart::store(\Auth::user()->id);//adaugam iar
                } else {
                    //cazul cand o fost luat din db, si trebuie adaugat iar
                    \Cart::store(\Auth::user()->id);
                }
            }
            /* \Cart::remove('c42f6beec9c93fd6afea6eb0684aa99');*/
        }

        $product = Product::where('id', $request->idProd)->first();
        if ($product) {
            if ($product->quantity > $request->quantity) { // daca cantitatea introdusa de user ii mai mare decat cantitatea prod din db ii dam maximul din db
                \Cart::add($product->id, $product->title, $request->quantity, $product->price);
            }
         else {
            \Cart::add($product->id, $product->title, $product->quantity, $product->price);
        }

        /// verificam daca trebuie salvat noul cart in db
        if (Auth::check()) {
            $id = \Auth::user()->id;//id'ul lui
            $cartIdentifier = DB::table('shoppingcart')->select('identifier')->where('identifier', '=', $id)->first();
            if ($cartIdentifier) {
                //exista deja, trebuie updatat
                DB::table('shoppingcart')->where('identifier', $cartIdentifier->identifier)->delete();//stergem
                \Cart::store(\Auth::user()->id);//adaugam iar
            } else {
                //cazul cand o fost luat din db, si trebuie adaugat iar
                \Cart::store(\Auth::user()->id);
            }
        }
    }

        return Response::json(['success' => '1']);
    }

    public function addToCart($id){

            //cand nu este logat
            $product = Product::where('id', $id)->first();
            if($product) {
               \Cart::add($product->id,$product->title,1,$product->price);
               /// verificam daca trebuie salvat noul cart in db
                if(Auth::check()) {
                    $id = \Auth::user()->id;//id'ul lui
                    $cartIdentifier = DB::table('shoppingcart')->select('identifier')->where('identifier', '=', $id)->first();
                    if($cartIdentifier) {
                        //exista deja, trebuie updatat
                        DB::table('shoppingcart')->where('identifier', $cartIdentifier->identifier)->delete();//stergem
                        \Cart::store(\Auth::user()->id);//adaugam iar
                    }
                    else {
                        //cazul cand o fost luat din db, si trebuie adaugat iar
                        \Cart::store(\Auth::user()->id);
                    }
                }
                /*Cart::add($product->id,$product->title, 1,$product->price);*/
                return redirect('/AccountCart');
            }
    }

    public function removeItem($id) {
        if($id) {
            \Cart::remove($id);
            if(Auth::check()) {
                $id = \Auth::user()->id;//id'ul lui
                $cartIdentifier = DB::table('shoppingcart')->select('identifier')->where('identifier', '=', $id)->first();
                if($cartIdentifier) {
                    //exista deja, trebuie updatat
                    DB::table('shoppingcart')->where('identifier', $cartIdentifier->identifier)->delete();//stergem
                    \Cart::store(\Auth::user()->id);//adaugam iar
                }
                else {
                    //cazul cand o fost luat din db, si trebuie adaugat iar
                    \Cart::store(\Auth::user()->id);
                }
            }
           /* \Cart::remove('c42f6beec9c93fd6afea6eb0684aa99');*/
            return redirect('/AccountCart');
        }
    }

    public static function  cartTotal(){
        return \Cart::total();
    }



}
