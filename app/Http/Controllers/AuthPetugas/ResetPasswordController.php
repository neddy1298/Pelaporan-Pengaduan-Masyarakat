<?php

namespace App\Http\Controllers\AuthPetugas;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:petugas');
    }

    public function guard()
    {
        return Auth::guard('petugas');
    }

    public function broker()
    {
        return Password::broker('petugas');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('petugas.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
