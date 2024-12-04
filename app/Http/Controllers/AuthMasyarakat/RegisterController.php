<?php

namespace App\Http\Controllers\AuthMasyarakat;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:masyarakat', ['except' => ['logoutMasyarakat']]);
    }

    public function showRegisterForm()
    {
        return view('masyarakat.auth.register');
    }

    public function register(Request $request)
    {
        // $this->Validat::make($request, [
        //     'nama' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:masyarakats'],
        //     'telp' => ['required', 'max:13'],
        //     'username' => ['required'],
        //     'password' => ['required', 'string', 'min:8'],
        //     'nik' => ['required', 'string', 'unique:masyarakats'],
        // ]);
        // Validate the form data

        $this->validate($request, [
            'nama' => 'required|unique:masyarakats,nama',
            'email' => 'required|email|unique:masyarakats,email',
            'telp' => 'required|min:8|max:13',
            'username' => 'required',
            'password' => 'required|min:6',
            'nik' => 'required|unique:masyarakats,nik',
        ]);
        $request->validate([
            'nama' => 'required|unique:masyarakats,nama',
            'email' => 'required|email|unique:masyarakats,email',
            'telp' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'nik' => 'required|unique:masyarakats,nik',
        ]);

        // $data = $request->all();

        $user = Masyarakat::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'telp' => $request['telp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'nik' => $request['nik'],
            'active' => 1,
        ]);
        Alert::success('Success!', 'Registrasi berhasil');

        Auth::login($user);

        return redirect('/#pengaduan');

    }
}
