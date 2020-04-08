<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        return view('masyarakat.home');
    }

    public function pengaduan()
    {
        return view('masyarakat.home');
    }
}
