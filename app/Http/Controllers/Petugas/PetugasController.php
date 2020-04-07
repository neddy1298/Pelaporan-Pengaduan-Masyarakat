<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Petugas;
use App\Models\Tanggapan;
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
        return view('petugas.admin.profile');
    }
}
