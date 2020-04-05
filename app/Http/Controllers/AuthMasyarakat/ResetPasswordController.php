<?php

namespace App\Http\Controllers\AuthMasyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest:masyarakat');
    }

    public function guard()
    {
        return Auth::guard('masyarakat');
    }

    public function broker()
    {
        return Password::broker('masyarakat');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('masyarakat.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

}
