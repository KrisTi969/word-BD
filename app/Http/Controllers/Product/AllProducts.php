<?php

namespace App\Http\Controllers\Product;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Response;
use Hash;
use DB;

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
        $this->middleware('guest')->except('logout');
    }

    public function getProducts()
    {
        $products = DB::table('products')->paginate(16);
        return view('product.productsRedirect', ['products' => $products]);
    }

    public function getTVs(Request $request)
    {
        $baseQuery = DB::table("products");
   /*         $baseQuery->where("type", "=", $type);
            $baseQuery->where("description", "like", "%".$producer."%");*/
        if($request->input('type')) {
            $baseQuery->where('type','=',$request->input('type'));
        }
        if($request->input('producer')) {
            $baseQuery->where('description','like',"%".$request->input('producer')."%");
        }
        if($request->input('priceMin') & $request->input('priceMax')) {
            $baseQuery->whereBetween('price',array($request->input('priceMin'),$request->input('priceMax')));
        }

        //Gasim id'ul produselor care nu se incadreaza in dimensiune
        if($request->input('sizeMin') & $request->input('sizeMax')) {
       //  dd($baseQuery->get()[2]->description);
       //     dd($baseQuery->get()->forget(3));  // stergem elementul din colectie

            $poziton = 0;
            foreach ($baseQuery->get() as $result) {
                $idToDeleteIfNecessary = $baseQuery->get()[$poziton]->id;
                $poziton++;
                //dd((json_decode($result->description)->{'Specificatii tehnice'})[2]);
               $arrayId =  json_decode($result->description)->{'Specificatii tehnice'};
               $id = $arrayId[2]->{'Display size'};
               dd($arrayId[2]->{'Display size'}); ///// 200cm -> sterge cm
               if($id <= $request->input('sizeMin') & $id >= $request->input('sizeMax')){
                   $baseQuery->get()->forget($idToDeleteIfNecessary);
               }
            }
        }

        $products = $baseQuery->paginate(16);
        return view("product.TVs")->with(["products" => $products]);
    }
}
