<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Models\Pengaduan;;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $samples = Pengaduan::join('masyarakats', 'masyarakats.nik', '=', 'pengaduans.nik')
        ->select('pengaduans.*', 'masyarakats.nama')
        ->where('status', 'selesai')->latest()->take(5)->get();
        return view('masyarakat.home', compact('samples'));
    }

    public function pengaduan()
    {
        return view('masyarakat.home');
    }
}
