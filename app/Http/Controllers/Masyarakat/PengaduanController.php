<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:masyarakat']);
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

    public function index2($custome)
    {
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')->latest('tgl_pengaduan')
        ->where('pengaduans.status', $custome)->paginate(8);
        $custome = $custome;
        return view('petugas.pengaduan.custome', compact('pengaduans', 'custome'));
    }

    public function search(Request $request)
    {

        $search = $request->search;

        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('pengaduans.nik','like',"%".$search."%")
        ->orWhere('masyarakats.nama','like',"%".$search."%")
        ->orWhere('pengaduans.isi_laporan','like',"%".$search."%")
        ->paginate(8);

        return view('petugas.pengaduan.search', compact('pengaduans', 'search'));
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
        Alert::success('Success!', 'Berhasil merubah status');
        return redirect()->back()->with('sukses');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        //
    }

    public function post(Request $request)
    {
        Pengaduan::create([
            'tgl_pengaduan' => now()->format('Y-m-d'),
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $request->foto,
        ]);
        Alert::success('Success!', 'Berhasil membuat laporan');
        return redirect()->route('masyarakat.pengaduan');
    }
}