<?php

namespace App\Http\Controllers\Ar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AugmentedRealityController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // Gets the query string from our form submission
        return view('ar.augmented_reality');
    }
}
