<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback()
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $existingUser = User::whereEmail($user->getEmail())->first();
        if($existingUser){
            auth()->login($existingUser);
            return redirect($this->rediretPath());
        }

        $newUser = User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt('password')
        ]);

        auth()->login($newUser);
        return redirect($this->rediretPath());
    }
}
