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
        
        // if user role_id equals to 1 go to voyager admin, else go to regular panel admin
        $user = User::where('email', $request['email'])->first(); 

        $attributes = $user->attributesToArray();
        dd($attributes->role_id);
        // dd($attributes);        
        // is recovering the desired respective user
        // dd($user);

//        if (!) {
//            // Authentication passed...
////            echo 'this';
//            return redirect('/login');
//        }


        if($attributes->role_id != 1)
            return redirect()->route('mainPanelEntry')->with('message','redirecting to main services panel');
        
        else if ($attributes->role_id == 1)
            return redirect('/admin');

        else 
            return redirect('/login')
               ->with('error', 'Try login again');

        // if ($result)
        //     return redirect('/admin');
        //         // ->with('success', 'Logged in successfuly');

        // if (!$result)
        // return redirect('/login')
        //     ->with('error', 'Login failed');
    }

}
