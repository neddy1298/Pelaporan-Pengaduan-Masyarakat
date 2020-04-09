<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Petugas;
use App\Models\Tanggapan;
use Auth;
use Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:petugas');
    }

    public function index()
    {
        $admins = Petugas::latest()->paginate('8');
        return view('petugas.admin.semua', compact('admins'));
    }

    public function detail($id)
    {
        $admin = Petugas::where('petugas.id_petugas', $id)->get()->first();
        $tanggapans = Tanggapan::where('tanggapans.id_petugas', $admin->id_petugas)->latest('tgl_tanggapan')->get();
        return view('petugas.admin.detail', compact('admin', 'tanggapans'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $admins = Petugas::where('petugas.nama_petugas','like',"%".$search."%")
        ->orWhere('petugas.email','like',"%".$search."%")
        ->latest()->paginate(8);
        // return $search;
        return view('petugas.admin.search', compact('admins', 'search'));
    }

    public function profile()
    {
        return view('petugas.admin.profile');
    }

    public function update(Request $request, $id)
    {
        $admin = Petugas::where('id_petugas', $id)->get()->first();

        if($request->password)
        {
            $admin->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                ]);
        }else
        {
            $admin->update($request->all());
        }
        Alert::success('Success!', 'Berhasil mengubah data');
        return redirect()->back();

    }
}
