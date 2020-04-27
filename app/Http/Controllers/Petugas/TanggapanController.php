<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{

    public function index()
    {
        $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas' ,'=','tanggapans.id_petugas')
        ->join('pengaduans', 'pengaduans.id_pengaduan' ,'=','tanggapans.id_pengaduan')
        ->select('tanggapans.*', 'petugas.nama_petugas', 'pengaduans.nik', 'pengaduans.isi_laporan', 'pengaduans.status', 'pengaduans.foto')
        ->latest('created_at')->paginate(8);
        return view('petugas.tanggapan.semua', compact('tanggapans'));
    }

    public function index2($custome)
    {
        $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas' ,'=','tanggapans.id_petugas')
        ->join('pengaduans', 'pengaduans.id_pengaduan' ,'=','tanggapans.id_pengaduan')
        ->select('tanggapans.*', 'petugas.nama_petugas', 'pengaduans.nik', 'pengaduans.isi_laporan', 'pengaduans.status', 'pengaduans.foto')
        ->latest('created_at')->where('pengaduans.status', $custome)->paginate(8);
        return view('petugas.tanggapan.custome', compact('tanggapans','custome'));
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('pengaduans.id_pengaduan', $id)
        ->get();
        $pengaduan = $pengaduan[0];
        $tanggapan = Tanggapan::join('petugas', 'petugas.id_petugas', '=', 'tanggapans.id_petugas')
        ->select('tanggapans.*','petugas.nama_petugas')
        ->where('tanggapans.id_tanggapan', $id)
        ->get();
        $tanggapan = $tanggapan[0];
        return view('petugas.tanggapan.detail', compact('pengaduan', 'tanggapan'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas' ,'=','tanggapans.id_petugas')
        ->join('pengaduans', 'pengaduans.id_pengaduan' ,'=','tanggapans.id_pengaduan')
        ->select('tanggapans.*', 'petugas.nama_petugas','pengaduans.status')
        ->latest('created_at')
        ->where('pengaduans.nik','like',"%".$search."%")
        ->orWhere('petugas.nama_petugas','like',"%".$search."%")
        ->paginate(8);

        return view('petugas.tanggapan.search', compact('tanggapans', 'search'));
    }

    public function store(Request $request)
    {

        Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => $request->tgl_tanggapan,
            'tanggapan' => $request->tanggapan,
            'id_petugas' => $request->id_petugas,
        ]);
        Alert::success('Success!', 'Berhasil memberi tanggapan');
        return redirect()->back();
    }
}
