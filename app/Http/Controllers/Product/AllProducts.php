<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AllProducts extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // only these people can acces the page
      //  $this->middleware('guest')->except('logout');
    }

    public function getProducts()
    {
        $products = DB::table('products')->paginate(16);
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products])->with(['images' => $images]);
    }

    public function getProductsWithFilterNew()
    {
            $products = DB::table('products')->orderBy('created_at', 'desc')->paginate(16);
            return view('product.productsRedirect', ['products' => $products]);
    }

    public function getProductsWithFilterLowPrice()
    {
        $products = DB::table('products')->orderBy('price', 'asc')->paginate(16);
        return view('product.productsRedirect', ['products' => $products]);
    }

    public function getProductsWithFilterHighPrice()
    {
        $products = DB::table('products')->orderBy('price', 'desc')->paginate(16);
        return view('product.productsRedirect', ['products' => $products]);
    }

    public function getProductsWithFilterBestRating()
    {
        $products = DB::table('products')->orderBy('rating', 'desc')->paginate(16);
        return view('product.productsRedirect', ['products' => $products]);
    }

    public function getTVs(Request $request)
    {
        function testRange($int,$min,$max){
            return ($min<$int && $int<$max);
        }

        $baseQuery = DB::table("products");

        $products = $baseQuery->get();
   /*         $baseQuery->where("type", "=", $type);
            $baseQuery->where("description", "like", "%".$producer."%");*/
        if($request->input('type')) {
            $baseQuery->where('type','=',$request->input('type'))->where('quantity','>',0);
        }
        if($request->input('producer')) {
            $baseQuery->where('description','like',"%".$request->input('producer')."%");
        }
        if($request->input('priceMin') && $request->input('priceMax')) {
            $baseQuery->whereBetween('price',array($request->input('priceMin'),$request->input('priceMax')))->where('quantity','>',0);
        }
        //Gasim id'ul produselor care nu se incadreaza in dimensiune


        if($request->input('sizeMin') && $request->input('sizeMax')) {
       //  dd($baseQuery->get()[2]->description);
       //     dd($baseQuery->get()->forget(3));  // stergem elementul din colectie
            $poziton = 0;
            foreach ($baseQuery->get() as $result) {
                $idToDeleteIfNecessary = $baseQuery->get()[$poziton]->id;
                $arrayId =  json_decode($result->description)->{'Specificatii tehnice'};
                $id = str_replace('cm','',$arrayId[2]->{'Display size'});
                /*  if( ( intval($id) <= intval($request->input('sizeMin')) )==false && ( intval($id)>= intval($request->input('sizeMax')) )==True ){*/
                if((testRange(intval($id),intval($request->input('sizeMin')),intval($request->input('sizeMax')))==false)) {
                $baseQuery->where('id','!=',$idToDeleteIfNecessary);
            }
            }
        }
        $products = $baseQuery->paginate(16);
        return view("product.TVs")->with(["products" => $products]);
    }
}
