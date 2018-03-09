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

class ProductController extends Controller
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

    public function findProduct($id)
    {
        $product = new Product();
        $product = Product::where('id', $id)->first();
        if (isset($product)) {
            $description = json_encode($product->description);
            $description = json_decode($description);
            $description = json_encode($description);
            return view('product.tvProduct')->with(['product'=>$product])
                                        ->with(['description'=>$description]);
        }
        else
            return abort(404);
    }
}
