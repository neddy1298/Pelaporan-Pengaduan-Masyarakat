<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use DB;

class PengaduanController extends Controller
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
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')->latest('tgl_pengaduan')->paginate(8);
        return view('petugas.pengaduan.semua', compact('pengaduans'));
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('pengaduans.id_pengaduan', $id)
        ->get();
        $pengaduan = $pengaduan[0];
        $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas', '=', 'tanggapans.id_petugas')
        ->select('tanggapans.*','petugas.nama_petugas')
        ->where('tanggapans.id_pengaduan', $id)
        ->get();
        return view('petugas.pengaduan.detail', compact('pengaduan', 'tanggapans'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::where('pengaduans.id_pengaduan', $id);
        $pengaduan->update(['status'=> $request->status]);
        return redirect()->back()->with('sukses');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
