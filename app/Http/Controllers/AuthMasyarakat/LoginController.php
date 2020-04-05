<?php

namespace App\Http\Controllers\AuthMasyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:masyarakat', ['except' => ['logoutMasyarakat']]);
    }

    public function showLoginForm()
    {
      return view('masyarakat.auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6',
      ]);

      $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

      // Attempt to log the user in
      if (Auth::guard('masyarakat')->attempt($credentials, $request->remember)) {
        // if successful, then redirect to their intended location
        
        return redirect()->intended(route('masyarakat.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logoutMasyarakat()
    {
        Auth::guard('masyarakat')->logout();
        return redirect('/');
    }
}
