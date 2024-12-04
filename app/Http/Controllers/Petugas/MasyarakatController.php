<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:petugas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Masyarakat::latest('masyarakats.created_at')->paginate('8');

        return view('petugas.users.semua', compact('users'));
    }

    public function detail($id)
    {
        $user = Masyarakat::where('masyarakats.id', $id)->get()->first();
        $pengaduans = Pengaduan::where('pengaduans.nik', $user->nik)->get();

        return view('petugas.users.detail', compact('user', 'pengaduans'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = Masyarakat::join('pengaduans', 'pengaduans.nik', '=', 'masyarakats.nik')
            ->where('masyarakats.nik', 'like', '%'.$search.'%')
            ->orWhere('masyarakats.nama', 'like', '%'.$search.'%')
            ->orWhere('masyarakats.email', 'like', '%'.$search.'%')
            ->latest('masyarakats.created_at')->paginate(8);

        return view('petugas.users.search', compact('users', 'search'));
    }
}
