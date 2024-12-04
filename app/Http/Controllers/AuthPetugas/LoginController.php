<?php

namespace App\Http\Controllers\AuthPetugas;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:petugas', ['except' => ['logoutPetugas']]);
    }

    public function showLoginForm()
    {
        return view('petugas.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt to log the user in
        if (Auth::guard('petugas')->attempt($credentials, $request->remember)) {
            // if successful, then redirect to their intended location
            Alert::success('Success!', 'Login berhasil!');

            return redirect()->intended(route('petugas.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logoutPetugas()
    {
        Auth::guard('petugas')->logout();

        return redirect('/admin');
    }
}
