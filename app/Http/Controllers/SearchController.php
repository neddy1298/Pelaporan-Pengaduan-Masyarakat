<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cari(Request $request)
    {
        dump('test');
        // $search = $request->cari;
        // return $search;
        // $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas' ,'=','tanggapans.id_petugas')
        // ->join('pengaduans', 'pengaduans.id_pengaduan' ,'=','tanggapans.id_pengaduan')
        // ->select('tanggapans.*', 'petugas.nama_petugas', 'pengaduans.nik', 'pengaduans.isi_laporan', 'pengaduans.status', 'pengaduans.foto')
        // ->latest('tgl_tanggapan')
        // ->where('pengaduans.nik','like',"%".$search."%")
        // ->orWhere('tanggapans.nama_petugas','like',"%".$search."%")
        // ->paginate(8);

        // return $pengaduan;
        // return view('petugas.tanggapan.search', compact('tanggapans'));
    }
}
