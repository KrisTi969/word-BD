<?php

namespace App\Http\Controllers\Order;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use DB;


class OrderController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        return view('order.checkout');
    }

    private function generateRandom(){
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];
        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }

    private function getProductType($name) {
        $product = Product::where('title','=',$name)->first();
        return $product->type;
    }

    public function newOrder(Request $request) {
       /* var_dump($request->email);
        var_dump($request->contact);
        var_dump($request->shipping_name);
        var_dump($request->shipping_country);
        var_dump($request->shipping_contact);
        var_dump($request->payment);
        var_dump($request->shipping_address);
        var_dump($request->shipping_postal);
        var_dump($request->shipping_notes);*/

        $number = $this->generateRandom();


        //adaugam order

        if(\Auth::user()) {
            $id = \Auth::user()->id;
        }
        else {
            $id = 85;
        }

        DB::insert('insert into orders (number, status,user_id, email,contact,shipping_name,shipping_city,shipping_address,country,postal_code,payment,notes)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$number, 'Pending',$id,$request->email,$request->contact,$request->shipping_name,
                                                                            $request->shipping_city,$request->shipping_address,$request->shipping_country,
                                                                            $request->shipping_postal,$request->payment,$request->shipping_notes]);
        //gasim orderul adaugat acum
        $order = Order::where('number','=',$number)->first();
        /*var_dump($order->number);*/


        foreach (\Cart::content() as $product) {
            DB::insert('insert into order_items (order_id, product_type,product_id, name, quantity, price)
            values (?, ?, ?, ?, ?, ?)', [$order->id, $this->getProductType($product->name), $product->id, $product->name, $product->qty, $product->price]);

            $query = DB::table('products')
                ->where('title','=',$product->name);

            $query->decrement('quantity',intval($product->quantity));
        }
        return view('order.orderSent');
    }
}
