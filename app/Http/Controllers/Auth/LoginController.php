<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Response;
use App\User;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

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
        $this->middleware('guest')->except('logout');
    }

    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:6',
        ]);

    if(!$validator->passes()) {
        return Response::json(['errors' => $validator->errors()]);
    }

        $user = User::where('email', $request->email)->first();
        $userp = User::where('password', bcrypt($request->password))->first();
        if ($validator->passes() & !$user )
            {
                return Response::json(['errors' => 'This email does not exist !']);
            }
        if ($validator->passes() & isset($user) & !(Hash::check($request->password, $user->password))  )
        {
            return Response::json(['errors' => 'Wrong password !']);
        }
        if ($validator->passes() & isset($user) & isset($userp)) {
            if($user->verified === 0) {
                return Response::json(['errors' => 'The account is not verified !']);
            }
        }
        return Response::json(['success' => '1']);
    }
}
