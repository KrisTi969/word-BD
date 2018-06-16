<?php

namespace App\Http\Controllers\Product;
use App\Product;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Response;
use Hash;
use DB;

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
      //  $this->middleware('guest')->except('logout');
    }

    public function findProduct($id)
    {
        $product = new Product();
        $product = Product::where('id', $id)->first();
        if (isset($product)) {
            $images = DB::table('prod_images')->where('prod_title','=',$product->title)->get();
            $description = json_encode($product->description);
            $description = json_decode($description);
            $description = json_encode($description);
            $product->views = $product->views + 1; // increment number of views
            $product->save();
            return view('product.tvProduct')->with(['product'=>$product])
                                        ->with(['description'=>$description])->with(['images'=>$images]);
        }
        else
            return abort(404);
    }

    public function addReview(Request $request){
     //   var_dump($request->product_id);
     //   var_dump($request->rating);
     //   var_dump($request->com_text);
        $user = User::where('id',\Auth::user()->id)->first();
        $product = Product::where('id',$request->product_id)->first();
        $user->comment($product, htmlspecialchars($request->com_text), $request->rating);
        return Response::json(['success' => '1']);
    }

    public static function getProductReviews($id) {
        $review = Comment::where('commentable_id', $id)->where('approved',1)->get(); // reviewurile de la produsul cu id ul dat ca param

        foreach ($review as $item) {
            $authorName = User::where('id', $item->commented_id)->first();

            echo '<div class="well well-sm">'; // returm the new comment
            echo "<b>$authorName->name</b> <small class='muted'>posted on: $item->created_at</small>     <input type=\"number\" name=\"\" id=\"\" class=\"rating\" data-max=\"5\" data-min=\"1\"  value=$item->rate data-readonly/>";
            echo "<br />";
            echo nl2br($item->comment);
            echo '</div>';
        }
    }

    public static function getProductName($id) {
        $product = Product::where('id', $id)->first();
    if($product) {
        return $product->title;
    }
    return 'The product no longer exists! ';
    }

    public static function getProductARFile($id) {
        $filename = DB::table('ar_files')->where('product_id',$id)->first();
        if($filename) {
            return $filename->filename;
        }
        return 'The product no longer exists! ';
    }

    public static function getProductId($name) {
        $product = Product::where('title', $name)->first();
        if($product) {
            return $product->id;
        }
        return 'The product no longer exists! ';
    }

    public static function getProductReviewCount($id){
        $product = Product::where('id',$id)->first();
        $review_count = $product->totalCommentCount();
        return $review_count;
    }

    public static function getCategory($id) {
        $product = Product::where('id',$id)->first();
        return $product->category;

    }

    public static function getProductAverageReview($id){
        $product = Product::where('id',$id)->first();
        $average_review = $product->averageRate();
        if($average_review == null) {
            $average_review = 0;
        }
        $product->average_reviews = $average_review;
        $product->save();
        return $average_review;
    }

    public static function getProductImage($name){
        $image = DB::table('prod_images')->where('prod_title',$name)->where('filename','like','1%')->first();
        /*var_dump($image);*/
        if($image) {
            return $image->filename;
        }else {
            return null;
        }
    }
}
