<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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

    // protected function authenticated(Request $request, $user)
    // {
    //     if ( $user->isAdmin() )
    //     {// do your margic here
    //         return redirect()->route('dashboard');
    //     }

    //     return redirect('/');
    // }
    public function redirectTo()
    {
        if (auth()->user()->is_admin) {
            return '/';
        } else if (auth()->user()->is_authenticated) {
            return '/';
        } else {
            return '/login';
        }
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('dashboard');
        $this->middleware('guest')->except('logout');
    }

}
