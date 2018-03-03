<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;
use Validator;

class GroceryController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }
    //
    public function store(Request $request)
    {
        $grocery = new Grocery();
        $grocery->name = $request->name;
        $grocery->type = $request->type;
        $grocery->price = $request->price;

        $grocery->save();
        return response()->json(['success'=>'Data is successfully added']);
    }
}

