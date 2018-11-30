<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Auth\Request;
// use AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // session()->put('previousUrl', url()->previous());

        return view('auth.login');
    }

    protected function logout(Request $request) {

        $destination = \Auth::logout();

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        
        $result = \Auth::attempt($credentials);
        
        
        $user = User::where('email', $request['email']);
        
        // $user = User::where('email', '=', $request['email'])->first();
        dd($user);

//        if (!) {
//            // Authentication passed...
////            echo 'this';
//            return redirect('/login');
//        }

        $attributes = $user->toArray();


        dd($attributes());

        if ($result)
            return redirect('/admin');
                // ->with('success', 'Logged in successfuly');

        if (!$result)
        return redirect('/login')
            ->with('error', 'Login failed');
    }

}
