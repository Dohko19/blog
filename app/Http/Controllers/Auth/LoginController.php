<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public $maxAttempts = 3;
    public $decayMinutes = 5;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *
     * private function credentials()
    {
        if($this->isNumber( $this->get('username')) ){
            $loginUsing = 'phone';
        }else{
            $loginUsing = filter_var($this->get('username'), FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'username';
        }

        return [
          $loginUsing => $this->get('username'),
          'password' => $this->get('password')
        ];
    }

    public function isNumber($value)
    {
        return is_numeric($value);
    }
     ***/
}
