<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class adminController extends Controller

{
	use AuthenticatesUsers;

	protected $redirectTo = 'admins/home';

	public function __construct()
	{
	    $this->middleware('guest:admin')->except('logout');
	}

    public function showLoginForm()
    {
    	return view('admin.auth.login');
    }

   public function login(Request $request)
   {
       $this->validateLogin($request);


       if ($this->attemptLogin($request)) {
           return $this->sendLoginResponse($request);
       }


       return $this->sendFailedLoginResponse($request);
   }

   protected function validateLogin(Request $request)
   {
       $this->validate($request, [
           $this->username() => 'required|string',
           'password' => 'required|string',
       ]);
   }

   public function logout(Request $request)
   {
       $this->guard()->logout();

       $request->session()->invalidate();

       return redirect('/admins');
   }

   protected function guard()
   {
       return Auth::guard('admin');
   }
  

}
