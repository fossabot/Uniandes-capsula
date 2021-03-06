<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/capsula';

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('azure')->redirect();
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
     public function handleProviderCallback()
     {
         $user = Socialite::driver('azure')->user();
         $givenName  =  explode(" ", $user->user["givenName"]);
         $surname  =  explode(" ", $user->user["surname"]);
         $email = $user->email;
         $usuario = User::where('email',$user->email)->first();
         if (!$usuario) {
           $usuario = new User();
           $usuario->name = isset($givenName[0]) ? $givenName[0] : "Usuario";
           $usuario->name2 = isset($givenName[1]) ? $givenName[1] : " ";
           $usuario->surname = isset($surname[0]) ? $surname[0] : "Visitante";
           $usuario->surname2 = isset($surname[1]) ? $surname[1] : " ";
           $usuario->email = $email;
           $usuario->password = "nulo";
           $usuario->save();
         }
         else{
           $usuario->update(array(
             'name' => $givenName[0],
             'name2' => isset($givenName[1]) ? $givenName[1] : "",
             'surname' => $surname[0],
             'surname2' => isset($surname[1]) ? $surname[1] : "",
           ));
         }
         $user = User::where('email',$user->email)->first();
         if ($user) {
           Auth::login($user);
           return redirect()->intended($this->redirectTo);
         }
         else{
           session()->flash('message', 'Usuario no existe');
           return redirect('login');
         }
     }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function local()
    {
         return view('auth.login-local');
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/login');
    }

}
