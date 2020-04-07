<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Masyarakat;
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
        $users = Masyarakat::join('pengaduans', 'pengaduans.nik', '=', 'masyarakats.nik')
        ->latest('masyarakats.created_at')->paginate('8');
        return view('petugas.users.semua', compact('users'));
    }

    public function detail($id)
    {
        $user = Masyarakat::join('pengaduans', 'pengaduans.nik', '=', 'masyarakats.nik')
        ->where('masyarakats.id', $id)->get();
        return view('petugas.users.detail', compact('user'));
    }

    public function search(Request $request, $search)
    {
        $search = $request->search;
        $users= Masyarakat::join('pengaduans', 'pengaduans.nik', '=', 'masyarakats.nik')
        ->where('masyarakats.nik', $search)
        ->orWhere('masyarakats.nama', $search)
        ->orWhere('masyarakats.email', $search)
        ->latest('masyrakats.created_at')->get();
        return view('petugas.users.detail', compact('users'));
    }
}
