<?php

namespace App\Http\Controllers\Account;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Response;
use App\Model\Order;

class AccountController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        if(\Auth::check()){
            return view('account.account');
        }
        else {
            return abort(404);
        }
    }

    public function orderIndex(){
        if(\Auth::check()){
        $order = Order::where('user_id',\Auth::user()->id)->get();
        $products = collect();//cream colectie noua
        foreach ($order as $item){
            $prodnou = DB::table('order_items')
                ->select(DB::raw('*'))
                ->where('order_id', '=', $item->id)
                ->get();
            foreach ($prodnou as $prod){
                $products->push($prod);//adaugam produsul la lista de produse ale repectivului user
            }
        }
            return view('account.orders',['orders' => $order, 'products' => $products]);
        }
        else {
            return abort(404);
        }
    }

    public function reviewsIndex(){
        if(\Auth::check()){
            $comments = Comment::where('commented_id',\Auth::user()->id)->where('approved','=',1)->get();
            return view('account.account_reviews',['comments' => $comments]);
        }
        else {
            return abort(404);
        }
    }


    public function editContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:60|unique:users,name,',
            'lname' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'username' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'birthdate' => 'required|string',
            'address' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'city' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'postal_code' => 'required|regex:/^[0-9]+$/u|max:18|',
            'country' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'phone_number' => 'required|min:10|numeric|'
        ]);

        if ($validator->passes()) {

            /*Restructuram formatul datei pentru a fi compatibil */
            $oldFormat = $request->birthdate;
            $newFormat = explode("-", $oldFormat);
            $birthdate = $newFormat[2] . $newFormat[1] . $newFormat[0];

              DB::table('users')
                  ->where('id', \Auth::user()->id)
                  ->update(['name' => $request->name, 'lname'=>$request->lname, 'username'=>$request->username, 'birthdate' => $birthdate,
                      'address'=>$request->address, 'city'=>$request->city, 'postal_code'=>$request->postal_code, 'country'=>$request->country, 'phone_number'=>$request->phone_number    ]);
              return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);

    }

}