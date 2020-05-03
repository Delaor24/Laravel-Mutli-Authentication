<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function ShowLoginForm(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
       $this->validate($request,[
          'email'=>'required|string',
          'password'=>'required|string'
       ]);

       $cradentials = [
           'email'=>$request->email,
           'password'=>$request->password
       ];

       if(Auth::guard('admin')->attempt($cradentials,$request->remember)){
          return redirect()->intended(route('admin.home'));
       }else{
        return redirect()->back()->withInputs($request->only('email','remember'));
       }
    }

    public function logout(){
       Auth::guard('admin')->logout();
       return redirect('/');
    }
}
