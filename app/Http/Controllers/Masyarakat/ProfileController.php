<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:masyarakat']);
    }

    public function index()
    {
        return view('masyarakat.profile');
    }

    public function update(Request $request, $nik)
    {
        $user = Masyarakat::where('nik', $nik)->get()->first();
        if($request->password)
        {
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                ]);
        }else
        {
            $user->update($request->all());
        }
        Alert::success('Success!', 'Berhasil mengubah data');
        return redirect()->back();
    }

}
