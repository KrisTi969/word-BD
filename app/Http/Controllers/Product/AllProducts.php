<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $products = DB::table('products')->where('category','=','Electronic Appliances')->paginate(16);
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products])->with(['images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsComputers()
    {
        $products = DB::table('products')->where('category','=','Computers-and-Accesories')->paginate(16);
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products])->with(['images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsWithFilterNew()
    {
        if( Route::getFacadeRoot()->current()->uri()== "Computers-and-Accesories") {
            $products = DB::table('products')->where('category','=','Computers-and-Accesories')->orderBy('created_at', 'desc')->paginate(16);
        }
        else {
            $products = DB::table('products')->where('category', '=', 'Electronic Appliances')->orderBy('created_at', 'desc')->paginate(16);
        }
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products, 'images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getAllProductsWithFilterNew(Request $request)
    {
        // Gets the query string from our form submission
        if ($request->query('search')) {
            $query = $request->input('search');
        } else
            $query = '';
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(16);

        $images = DB::table('prod_images')->get();


        // returns a view and passes the view the list of articles and the original query.
        return view('search.results')->with(['products' => $products])->with(['images' => $images, 'query' => $query,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getAllProductsWithFilterPopular(Request $request)
    {
        // Gets the query string from our form submission
        if ($request->query('search')) {
            $query = $request->input('search');
        } else
            $query = '';
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orderBy('views', 'desc')
            ->paginate(16);

        $images = DB::table('prod_images')->get();


        // returns a view and passes the view the list of articles and the original query.
        return view('search.results')->with(['products' => $products])->with(['images' => $images, 'query' => $query,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getAllProductsWithFilterPriceLow(Request $request)
    {
        // Gets the query string from our form submission
        if ($request->query('search')) {
            $query = $request->input('search');
        } else
            $query = '';
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orderBy('price', 'asc')
            ->paginate(16);

        $images = DB::table('prod_images')->get();


        // returns a view and passes the view the list of articles and the original query.
        return view('search.results')->with(['products' => $products])->with(['images' => $images, 'query' => $query,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getAllProductsWithFilterPriceHigh(Request $request)
    {
        // Gets the query string from our form submission
        if ($request->query('search')) {
            $query = $request->input('search');
        } else
            $query = '';
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orderBy('price', 'desc')
            ->paginate(16);

        $images = DB::table('prod_images')->get();


        // returns a view and passes the view the list of articles and the original query.
        return view('search.results')->with(['products' => $products])->with(['images' => $images, 'query' => $query,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getAllProductsWithFilterRating(Request $request)
    {
        // Gets the query string from our form submission
        if ($request->query('search')) {
            $query = $request->input('search');
        } else
            $query = '';
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $products = DB::table('products')->where('title', 'LIKE', '%' . $query . '%')->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orderBy('average_reviews', 'desc')
            ->paginate(16);

        $images = DB::table('prod_images')->get();


        // returns a view and passes the view the list of articles and the original query.
        return view('search.results')->with(['products' => $products])->with(['images' => $images, 'query' => $query,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsWithFilterMostPopular()
    {
        if( Route::getFacadeRoot()->current()->uri()== "Computers-and-Accesories") {
            $products = DB::table('products')->where('category','=','Computers-and-Accesories')->orderBy('views', 'desc')->paginate(16);
        }
        else {
            $products = DB::table('products')->where('category', '=', 'Electronic Appliances')->orderBy('views', 'desc')->paginate(16);
        }
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products, 'images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsWithFilterLowPrice()
    {
        if( Route::getFacadeRoot()->current()->uri()== "Computers-and-Accesories") {
            $products = DB::table('products')->where('category','=','Computers-and-Accesories')->orderBy('price', 'asc')->paginate(16);
        }
        else {
            $products = DB::table('products')->where('category', '=', 'Electronic Appliances')->orderBy('price', 'asc')->paginate(16);
        }
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products, 'images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsWithFilterHighPrice()
    {
        if( Route::getFacadeRoot()->current()->uri()== "Computers-and-Accesories") {
            $products = DB::table('products')->where('category','=','Computers-and-Accesories')->orderBy('price', 'desc')->paginate(16);
        }
        else {
            $products = DB::table('products')->where('category', '=', 'Electronic Appliances')->orderBy('price', 'desc')->paginate(16);
        }
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products, 'images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getProductsWithFilterBestRating()
    {
        if( Route::getFacadeRoot()->current()->uri()== "Computers-and-Accesories") {
            $products = DB::table('products')->where('category','=','Computers-and-Accesories')->orderBy('average_reviews', 'desc')->paginate(16);
        }
        else {
            $products = DB::table('products')->where('category', '=', 'Electronic Appliances')->orderBy('average_reviews', 'desc')->paginate(16);
        }
        $images = DB::table('prod_images')->get();
        return view('product.productsRedirect', ['products' => $products, 'images' => $images,'afisare' => Route::getFacadeRoot()->current()->uri()]);
    }

    public function getTVs(Request $request)
    {
        $baseQuery = DB::table("products");

        if ($request->input('type')) {
            $baseQuery->where('type', '=', $request->input('type'))->where('quantity', '>', 0);
        }

        if ($request->input('producer')) {
            $baseQuery->where('description', 'like', "%" . $request->input('producer') . "%");
        }
        if ($request->input('priceMin') && $request->input('priceMax')) {
            $baseQuery->whereBetween('price', [$request->input('priceMin'),$request->input('priceMax')]);
        }
        if ($request->input('review')) {
            if ($request->input('review') >= 1) {
                $baseQuery->whereBetween('average_reviews', [$request->input('review') - 0.5, $request->input('review') + 0.5]);
            }
        }

            //Gasim id'ul produselor care nu se incadreaza in dimensiune
            if ($request->input('sizeMin') && $request->input('sizeMax')) {

                $poziton = 0;
                foreach ($baseQuery->get() as $result) {
                    $idToDeleteIfNecessary = $baseQuery->get()[$poziton]->id;
                    /*var_dump($result->description);*/
                    $descr = json_decode($result->description);
                    if (isset($descr->{'Technical specifications'})) {
                        foreach ($descr->{'Technical specifications'} as $ceva => $ceva2) {
                            if (isset($ceva2->{'Display size'})) {
                                $id = str_replace('cm', '', $ceva2->{'Display size'});
                                if (intval($id) >= intval($request->input('sizeMin')) && intval($id) <= intval($request->input('sizeMax'))) {
                                  /*    echo $idToDeleteIfNecessary ."ii bun  pe" . "ca are" . $id. "<br>";
                                      echo ($request->input('sizeMax')) . "<br>";
                                        echo $idToDeleteIfNecessary ."<br>";
                                        echo $id ."<br>";
                                        echo ($request->input('sizeMin')) . "<br>";
                                        echo ($request->input('sizeMax')) . "<br>";*/
                                    $poziton++;
                                } else {
                                  /*   echo $idToDeleteIfNecessary ."eliminam pe" . "ca are" . $id. "<br>";*/
                                    $baseQuery->where('id', '!=', $idToDeleteIfNecessary);
                                }
                            }
                        }
                    } else {
                        $baseQuery->where('id', '!=', $idToDeleteIfNecessary);
                    }

                }
            }


        $products = $baseQuery->whereIn('type',['4kTV','curvedTV','oledTV','lcdTV','plasmaTV','ledTV'])->paginate(16);
        $images = DB::table('prod_images')->get();
        return view("product.TVs")->with(["products" => $products, 'images' => $images]);
    }

    public function getCamerasPhotosVideos(Request $request)
    {
        $baseQuery = DB::table("products");

        if ($request->input('type')) {
            $baseQuery->where('type', '=', $request->input('type'))->where('quantity', '>', 0);
        }
        if ($request->input('producer')) {
            $baseQuery->where('description', 'like', "%" . $request->input('producer') . "%");
        }
        if ($request->input('priceMin') && $request->input('priceMax')) {
            $baseQuery->whereBetween('price', [$request->input('priceMin'),$request->input('priceMax')]);
        }
        if ($request->input('review')) {
            if ($request->input('review') >= 1) {
                $baseQuery->whereBetween('average_reviews', [$request->input('review') - 0.5, $request->input('review') + 0.5]);
            }
        }
        $products = $baseQuery->whereIn('type',['accesories','bags&cases','digital-cameras','film-photografy','flashes','lightning&studio','lenses','video','binoculars&scopes'])->paginate(16);
        $images = DB::table('prod_images')->get();
        return view("product.cameras")->with(["products" => $products, 'images' => $images]);
    }

    public function getSmartphones(Request $request)
    {

        $baseQuery = DB::table("products");

        if ($request->input('type')) {
            $baseQuery->where('type', '=', $request->input('type'))->where('quantity', '>', 0);
        }
        if ($request->input('producer')) {
            $baseQuery->where('description', 'like', "%" . $request->input('producer') . "%");
        }
        if ($request->input('priceMin') && $request->input('priceMax')) {
            $baseQuery->whereBetween('price', [$request->input('priceMin'),$request->input('priceMax')]);
        }
        if ($request->input('review')) {
            if ($request->input('review') >= 1) {
                $baseQuery->whereBetween('average_reviews', [$request->input('review') - 0.5, $request->input('review') + 0.5]);
            }
        }

        //Gasim id'ul produselor care nu se incadreaza in dimensiune
        if ($request->input('sizeMin') && $request->input('sizeMax')) {

            $poziton = 0;
            foreach ($baseQuery->get() as $result) {
                $idToDeleteIfNecessary = $baseQuery->get()[$poziton]->id;
                /*var_dump($result->description);*/
                $descr = json_decode($result->description);
                if (isset($descr->{'Technical specifications'})) {
                    foreach ($descr->{'Technical specifications'} as $ceva => $ceva2) {
                        if (isset($ceva2->{'Display size'})) {
                            $id = str_replace('inch', '', $ceva2->{'Display size'});
                            if (intval($id) >= intval($request->input('sizeMin')) && intval($id) <= intval($request->input('sizeMax'))) {
                                $poziton++;
                            } else {
                                $baseQuery->where('id', '!=', $idToDeleteIfNecessary);
                            }
                        }
                    }
                } else {
                    $baseQuery->where('id', '!=', $idToDeleteIfNecessary);
                }

            }
        }

        $products = $baseQuery->whereIn('type',['smartphone','smartwatch','phonecase','bluetooth-headset','smartphone-accesories','headphone'])->paginate(16);
        $images = DB::table('prod_images')->get();
        return view("product.smartphones")->with(["products" => $products, 'images' => $images]);
    }
}