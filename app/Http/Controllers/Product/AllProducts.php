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

    public function getTVs()
    {
        $products = DB::table('products')->paginate(16);
        return view('product.TVs', ['products' => $products]);
    }

}
