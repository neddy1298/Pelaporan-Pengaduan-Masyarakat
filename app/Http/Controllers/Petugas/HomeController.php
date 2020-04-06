<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $admins = Petugas::all();
        $users = Masyarakat::all();
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')->latest('tgl_pengaduan')->get();
        $tanggapans = Tanggapan::join('pengaduans', 'pengaduans.id_pengaduan' ,'=','tanggapans.id_pengaduan')
        ->join('petugas', 'petugas.id_petugas', '=', 'tanggapans.id_petugas')
        ->join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama' , 'petugas.nama_petugas')
        ->latest()->get();
        return view('petugas.home', compact('admins', 'users', 'pengaduans', 'pengaduans', 'tanggapans'));
    }
    
}
