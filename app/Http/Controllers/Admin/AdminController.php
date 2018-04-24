<?php

namespace App\Http\Controllers\Admin;
use Mockery\Exception;
use Response;
use Validator;
use DB;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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



    public function deleteComment(Request $request) {
        try {
            DB::table('comments')->where('id','=',$request->id)->delete();

            return Response::json(['success' => '1']);
        }
        catch (\SQLiteException $e) {
            return Response::json(['errors' => '1']);
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


    public function  refreshComments() {
        $comments = DB::table('comments')->where('approved','=',0)->orderBy('created_at', 'desc')->paginate(10);

        $comments->setPath('commentList');

        $html = view('admin.commentsTable', compact('comments'))->render();

        return response()->json(compact('html'));
    }
}
