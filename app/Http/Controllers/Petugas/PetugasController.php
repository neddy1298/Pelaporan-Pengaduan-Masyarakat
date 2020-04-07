<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Petugas;
use App\Models\Tanggapan;
use Auth;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
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
        $user = Auth::user()->get()->first();
        return view('petugas.admin.profile', compact('user'));
    }

    public function update(Request $request)
    {

        // $user = Petugas::find($id);
        // return $user;
        // Alert::success('Success!', 'Berhasil merubah profile');
        // return view('petugas.admin.profile');
        // return redirect()->back();
    }

    public function update2(Request $request, $id)
    {
        return view('petugas.admin.profile');
    }
}
