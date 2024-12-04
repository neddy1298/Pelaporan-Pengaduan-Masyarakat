<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Pengaduan;

class HomeController extends Controller
{
    public function index()
    {
        $samples = Pengaduan::join('masyarakats', 'masyarakats.nik', '=', 'pengaduans.nik')
            ->select('pengaduans.*', 'masyarakats.nama')
            ->where('status', 'selesai')->latest()->take(5)->get();

        return view('masyarakat.home', compact('samples'));
    }
}
