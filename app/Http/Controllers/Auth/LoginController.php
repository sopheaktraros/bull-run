<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        //$this->middleware('guest:subscriber')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    protected function showLoginForm(){
        return view('auth.login');
    }
    
    protected function authenticated(Request $request, $user)
    {
       
        $role = User::select("role_id")->where('id',$user->id)->first();
        session(['role_id' => $role->role_id]);
        return redirect($this->redirectTo);
    }
}
