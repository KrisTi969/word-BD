<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use Intervention\Image\Image;
use Matriphe\Imageupload\Imageupload;
use Mockery\Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Response;
use Validator;
use DB;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Matriphe\Imageupload\ImageuploadModel;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index (){
    return view('admin.admin-index');
   }
    public function newUSer (){
        return view('admin.admin-addUser');
    }

    public function newProduct() {
        return view('admin.admin-addProduct');
    }

    public function userList (Request $request){
        $users = DB::table('users')->orderBy('name', 'asc')->paginate(10);
        if($request->search){
            $users = DB::table('users')->orderBy('name', 'asc')->where('name','like','%' . $request->search . '%')
                                                                    ->orWhere('lname','like','%' . $request->search . '%')
                ->orWhere('phone_number','like','%' . $request->search . '%')
                ->orWhere('country','like','%' . $request->search . '%')
                ->orWhere('postal_code','like','%' . $request->search . '%')
                ->orWhere('birthdate','like','%' . $request->search . '%')
                ->orWhere('email','like','%' . $request->search . '%')
                ->orWhere('city','like','%' . $request->search . '%')
                ->orWhere('role','like','%' . $request->search . '%')

                ->paginate(10);
        }
        return view('admin.admin-editUser',['users' => $users]);
    }

    public function productList (Request $request){
        $products = DB::table('products')->orderBy('title', 'asc')->paginate(18);
        if($request->search){
            $products = DB::table('products')->orderBy('title', 'asc')->where('title','like','%' . $request->search . '%')
                ->orWhere('type','like','%' . $request->search . '%')
                ->orWhere('price','like','%' . $request->search . '%')
                ->orWhere('quantity','like','%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->paginate(18);
        }
        if(\Route::currentRouteName() == "Admin-UpdateProductImages") {
            return view('admin.admin-updateProductImages',['products' => $products]);
        }
        return view('admin.admin-productList',['products' => $products]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:60|unique:users,name,',
            'lname' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'username' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'birthdate' => 'required|string',
            'address' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'city' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'postal_code' => 'required|regex:/^[0-9]+$/u|max:18|',
            'country' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'phone_number' => 'required|min:10|numeric|'
        ]);

        if ($validator->passes()) {

            $user = new User();

            $user->name = $request->name;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->username = $request->username;
            $user->phone_number = $request->phone_number;

            /*Restructuram formatul datei pentru a fi compatibil */
            $oldFormat = $request->birthdate;
            $newFormat = explode("-", $oldFormat);
            $user->birthdate = $newFormat[2] . $newFormat[1] . $newFormat[0];

            $user->address = $request->address;
            $user->city = $request->city;
            $user->postal_code = $request->postal_code;
            $user->country = $request->country;
            $user->email_token = base64_encode($request->email);
            $user->timestamps;


            $user->save();

            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);

    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:60|unique:products,title',
            'type' => 'required|',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'title1' => 'required',
            'field1' => 'required',
            'value1' => 'required'
        ]);

        if ($validator->passes()) {
            $product = new Product();

            $product->type = $request->type;
            $product->title= $request->title;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;

            $product->save();
            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);

    }


    public function editContactByAdmin(Request $request)
    {
        if($request->email == $request->emailBeforeUpgrade)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[a-zA-Z]+$/u|max:60|',
                'lname' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'username' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'birthdate' => 'required|string',
                'address' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'city' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'postal_code' => 'required|regex:/^[0-9]+$/u|max:18|',
                'country' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'phone_number' => 'required|min:10|numeric|',
                'role' => 'required|max:7',
                'email' => 'required|string|email|max:100|'
            ]);
        }
        else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[a-zA-Z]+$/u|max:60|',
                'lname' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'username' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'birthdate' => 'required|string',
                'address' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'city' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'postal_code' => 'required|regex:/^[0-9]+$/u|max:18|',
                'country' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
                'phone_number' => 'required|min:10|numeric|',
                'role' => 'required|max:7',
                'email' => 'required|string|email|max:100|unique:users'
            ]);
        }
        if ($validator->passes()) {
            DB::table('users')
                ->where('email', $request->emailBeforeUpgrade)
                ->update(['name' => $request->name, 'lname'=>$request->lname, 'username'=>$request->username, 'birthdate' => $request->birthdate,
                    'address'=>$request->address, 'city'=>$request->city, 'postal_code'=>$request->postal_code, 'country'=>$request->country, 'phone_number'=>$request->phone_number,
                    'email'=>$request->email, 'role' =>$request->role]);
            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);

    }

    public function deleteUser(Request $request)
    {
           try{
               DB::table('users')->where('email', '=', $request->emailBeforeUpgrade)->delete();
               return Response::json(['success' => '1']);
           }
           catch (\SQLiteException $e){
               return Response::json(['errors' => '1']);
    }
    }

   public function  showUncheckedComments() {
        if((new \Illuminate\Http\Request)->isMethod('get')) {
            $comments = DB::table('comments')->where('approved','=',0)->orderBy('created_at', 'desc')->paginate(10);
            return view('admin.admin-uncheckedComments', ['comments' => $comments]);
        }
        else{
            $comments = DB::table('comments')->where('approved','=',0)->orderBy('created_at', 'desc')->paginate(10);

            $html = view('admin.commentsTable', compact('comments'))->render();

            return response()->json(compact('html'));
        }
    }

    public function  showPendingOrders() {
        if((new \Illuminate\Http\Request)->isMethod('get')) {
            $orders = DB::table('orders')->where('status','=','Pending')->orderBy('created_at', 'desc')->paginate(10);
            $products = collect();//cream colectie noua
            foreach ($orders as $item){
                $prodnou = DB::table('order_items')
                    ->select(DB::raw('*'))
                    ->where('order_id', '=', $item->id)
                    ->get();
                foreach ($prodnou as $prod){
                    $products->push($prod);//adaugam produsul la lista de produse ale repectivului user
                }
            }
            return view('admin.admin-PendingOrders', ['orders' => $orders, 'products' => $products]);
        }
        else{
            $orders = DB::table('orders')->where('status','=','Pending')->orderBy('created_at', 'desc')->paginate(10);
            $products = collect();//cream colectie noua
            foreach ($orders as $item){
                $prodnou = DB::table('order_items')
                    ->select(DB::raw('*'))
                    ->where('order_id', '=', $item->id)
                    ->get();
                foreach ($prodnou as $prod){
                    $products->push($prod);//adaugam produsul la lista de produse ale repectivului user
                }
            }
            try {
                $html = view('admin.ordersTable', compact('orders', 'products'))->render();
            } catch (\Throwable $e) {
            }

            return response()->json(compact('html'));
        }
    }

    public function refreshPendingOrders() {
        $orders = DB::table('orders')->where('status','=','Pending')->orderBy('created_at', 'desc')->paginate(10);
        $products = collect();//cream colectie noua
        foreach ($orders as $item){
            $prodnou = DB::table('order_items')
                ->select(DB::raw('*'))
                ->where('order_id', '=', $item->id)
                ->get();
            foreach ($prodnou as $prod){
                $products->push($prod);//adaugam produsul la lista de produse ale repectivului user
            }
        }
        try {
            $html = view('admin.ordersTable', compact('orders', 'products'))->render();
        } catch (\Throwable $e) {
        }

        return response()->json(compact('html'));
    }



    public function deleteComment(Request $request) {
        try {
            DB::table('comments')->where('id','=',$request->id)->delete();

            return Response::json(['success' => '1']);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
        }
    }


    public function deleteOrder(Request $request) {
        try {
            DB::table('orders')->where('id','=',$request->id)->delete();
            DB::table('order_items')->where('order_id','=',$request->id)->delete();
            return Response::json(['success' => '1']);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
        }
    }


    public function deleteProduct(Request $request)
    {
        $results = DB::table('products')->where('title', '=', $request->titleBeforeUpgrade)->count();
        $product = Product::where('title', '=', $request->titleBeforeUpgrade)->first();
        if ($results != 0) {
            try {
                DB::table('comments')->where('commentable_id', '=', $product->id)->delete();
                DB::table('prod_images')->where('prod_title', '=', $request->titleBeforeUpgrade)->delete();
                DB::table('products')->where('title', '=', $request->titleBeforeUpgrade)->delete();
                return Response::json(['success' => '1']);
            } catch (\SQLiteException $e) {
                return Response::json(['errors' => '1']);
            }
        }
        return Response::json(['success' => '1']);
    }

    public function updateProduct(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:200|',
                'type' => 'required|max:50|',
                'price' => 'required|numeric|',
                'quantity' => 'required|numeric',
            ]);
        if ($validator->passes()) {
            try {
               /* DB::table('products')
                    ->where('title', $request->titleBeforeUpgrade)
                    ->update(['title' => $request->title, 'description' =>serialize($request->description), 'price'=>$request->price,'quantity'=>$request->quantity]);
    */
                $product = Product::where('title', $request->titleBeforeUpgrade)->first();;

                $product->title = $request->title;
                $product->type = $request->type;
                $product->description = $request->description;
                $product->quantity= $request->quantity;
                $product->price = $request->price;
                $product->save();

               return Response::json(['success' => '1']);
            } catch (\SQLiteException $e) {

            }
        }
        else {
            return Response::json(['errors' => $validator->errors()]);
        }
    }

    public function approveComment(Request $request) {
        try {
            DB::table('comments')
                ->where('id', $request->id)
                ->update(['approved' => 1]);
            return Response::json(['success' => '1']);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
        }
    }

    public function approveOrder(Request $request) {
        try {
            DB::table('orders')
                ->where('id', $request->id)
                ->update(['status' => 'Sent to Courier']);
            return Response::json(['success' => '1']);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
        }
    }


    public function  refreshComments() {
        $comments = DB::table('comments')->where('approved','=',0)->orderBy('created_at', 'desc')->paginate(10);

        $comments->setPath('commentList');

        $html = view('admin.commentsTable', compact('comments'))->render();

        return response()->json(compact('html'));
    }



    public function show(){
        return view('test');
    }
    public function uploadFiles(Request $request){
        /*var_dump($request->route('title'));*/
        $validator = Validator::make($request->all(), [
            'image1' => 'required|mimes:jpg,jpeg,png,gif',
            'image2' => 'required|mimes:jpg,jpeg,png,gif',
            'image3' => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        if ($validator->passes()) {

            $file1 = $request->file('image1');
            $file2 = $request->file('image2');
            $file3 = $request->file('image3');

            /*//Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();*/

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file1->move($destinationPath, '1'.$file1->getClientOriginalName());
            $file2->move($destinationPath, '2'.$file2->getClientOriginalName());
            $file3->move($destinationPath, '3'.$file3->getClientOriginalName());

            try{
                DB::table('prod_images')->insert([
                    ['prod_title' => $request->route('title'), 'filename' => '1'.$file1->getClientOriginalName()],
                    ['prod_title' => $request->route('title'), 'filename' => '2'.$file2->getClientOriginalName()],
                    ['prod_title' => $request->route('title'), 'filename' => '3'.$file3->getClientOriginalName()]
                ]);
            }catch (\SQLiteException $e) {
                return Response::json(['errors' => $validator->errors()]);
            }

            return Response::json(['success' => '1']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function uploadFilesAndModify(Request $request){


        if($request->file('image1')&& $request->file('image2') && $request->file('image3')) {
            $validator = Validator::make($request->all(), [
                'image1' => 'required|mimes:jpg,jpeg,png,gif',
                'image2' => 'required|mimes:jpg,jpeg,png,gif',
                'image3' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }
        if($request->file('image1') && $request->file('image2') ) {
            $validator = Validator::make($request->all(), [
                'image1' => 'required|mimes:jpg,jpeg,png,gif',
                'image2' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }

        if($request->file('image1') && $request->file('image3')) {
            $validator = Validator::make($request->all(), [
                'image1' => 'required|mimes:jpg,jpeg,png,gif',
                'image3' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }

        if( $request->file('image2') && $request->file('image3')) {
            $validator = Validator::make($request->all(), [
                'image2' => 'required|mimes:jpg,jpeg,png,gif',
                'image3' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }
        if($request->file('image1')) {
            $validator = Validator::make($request->all(), [
                'image1' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }
        if($request->file('image2')) {
            $validator = Validator::make($request->all(), [
                'image2' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }
        if($request->file('image3')) {
            $validator = Validator::make($request->all(), [
                'image3' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
        }



        $destinationPath = 'uploads';
        if ($validator->passes()) {

            if($request->file('image1')) {
                $file1 = $request->file('image1');
                $file1->move($destinationPath, '1'.$file1->getClientOriginalName());
                DB::table('prod_images')->where('prod_title','=',$request->route('title'))->where('filename','like','1%')->delete();
                DB::table('prod_images')->insert([
                    ['prod_title' => $request->route('title'), 'filename' => '1'.$file1->getClientOriginalName()],
                ]);
            }
            if($request->file('image2')) {
                $file2 = $request->file('image2');
                $file2->move($destinationPath, '2'.$file2->getClientOriginalName());
                DB::table('prod_images')->where('prod_title','=',$request->route('title'))->where('filename','like','2%')->delete();
                DB::table('prod_images')->insert([
                    ['prod_title' => $request->route('title'), 'filename' => '2'.$file2->getClientOriginalName()],
                ]);
            }
            if($request->file('image3')) {
                $file3 = $request->file('image3');
                $file3->move($destinationPath, '3'.$file3->getClientOriginalName());
                DB::table('prod_images')->where('prod_title','=',$request->route('title'))->where('filename','like','3%')->delete();
                DB::table('prod_images')->insert([
                    ['prod_title' => $request->route('title'), 'filename' => '3'.$file3->getClientOriginalName()],
                ]);
            }


            /*//Display File Name
            echo 'File Name: '.$file->getClientOriginalName();
            echo '<br>';

            //Display File Extension
            echo 'File Extension: '.$file->getClientOriginalExtension();
            echo '<br>';

            //Display File Real Path
            echo 'File Real Path: '.$file->getRealPath();
            echo '<br>';

            //Display File Size
            echo 'File Size: '.$file->getSize();
            echo '<br>';

            //Display File Mime Type
            echo 'File Mime Type: '.$file->getMimeType();*/

            //Move Uploaded File
          /*  $destinationPath = 'uploads';
            $file1->move($destinationPath, '1'.$file1->getClientOriginalName());
            $file2->move($destinationPath, '2'.$file2->getClientOriginalName());
            $file3->move($destinationPath, '3'.$file3->getClientOriginalName());*/

           /* try{
                DB::table('prod_images')->where('prod_title','=',$request->route('title'))->delete();

                DB::table('prod_images')->insert([
                    ['prod_title' => $request->route('title'), 'filename' => '1'.$file1->getClientOriginalName()],
                    ['prod_title' => $request->route('title'), 'filename' => '2'.$file2->getClientOriginalName()],
                    ['prod_title' => $request->route('title'), 'filename' => '3'.$file3->getClientOriginalName()]
                ]);
            }catch (\SQLiteException $e) {
                return Response::json(['errors' => $validator->errors()]);
            }*/

            return Response::json(['success' => '1']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function getProductImages(Request $request) {
        $ceva = [];
        $poz = 0;
        try {
            $images = DB::table('prod_images')->where('prod_title','=',$request->title)->get();
            foreach ($images as $chestie) {
                $ceva[$poz] = $chestie->filename;
                $poz++;
            }
            return Response::json(['success' => '1','data'=>$ceva]);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
        }
    }

    public static function countUncheckedComments(){
        $count = DB::table('comments')->where('approved','=',0)->count();
        return $count;
    }

    public static function countUsers(){
        $count = DB::table('users')->count();
        return $count;
    }

    public static function countPendingOrders(){
        $count = DB::table('orders')->where('status','=','pending')->count();
        return $count;
    }

    public static function countProducts(){
        $count = DB::table('products')->count();
        return $count;
    }


}
