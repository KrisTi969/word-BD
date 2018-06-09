<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Response;
use DB;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|regex:/^[a-zA-Z]+$/u|max:60|',
            'lname' => 'required|regex:/^[a-zA-Z]+$/u|max:50|',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            /* 'email' => $data['email'],
             'password' => bcrypt($data['password']),*/
        ]);
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
            'address' => 'required|regex:/^[ a-zA-Z]+$/u|max:100|',
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
            $user->setRememberToken($user->name.$user->lname);
            $user->save();

            dispatch(new SendVerificationEmail($user));
            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);

    }

    public  function email_verification($token)
    {
       // $user = new User();
        $user = User::where('email_token', $token)->first();
        $user->verified = 1;
        if ($user->save()) {
            return view('email.emailconfirm', ['user' => $user]);
        }
    }
}