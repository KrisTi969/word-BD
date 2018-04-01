<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = $request->input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')->paginate(16);

        // returns a view and passes the view the list of articles and the original query.
        return view('search.results', compact('products', 'query'));
    }

    public function autocomplete(Request $request)
    {
        $term=$request->term;
        $data = Product::where('title','LIKE','%'.$term.'%')
            ->take(10)
            ->get();
        $result=array();
        foreach ($data as $key => $value){
            $result[]=['title' =>$value->title, 'id'=>$value->id];
        }
        return response()->json($result);
    }

}
