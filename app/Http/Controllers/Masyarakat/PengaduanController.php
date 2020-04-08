<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use File;
class PengaduanController extends Controller
{

    public function index()
    {
        $pengaduans = Pengaduan::where('status', 'proses')
        ->orWhere('status', 'selesai')
        ->paginate(5);

        $pengaduans->where('masyarakats.nik', Auth::user()->nik);
        return view('masyarakat.pengaduan.user', compact('pengaduans'));
    }

    public function index2()
    {
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('status', 'proses|selesai')
        ->get();
        return view('masyarakat.pengaduan.semua', compact('pengaduans'));
    }


    public function pengaduan()
    {
        $pengaduan = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('status', 'proses|selesai')
        ->andWhere('masyarakats.nik', Auth::user()->nik)
        ->get();
        // $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas', '=', 'tanggapans.id_petugas')
        // ->select('tanggapans.*','petugas.nama_petugas')
        // ->where('tanggapans.id_pengaduan')
        // ->get();
        return view('petugas.pengaduan.detail', compact('pengaduan', 'tanggapans'));
    }

    public function post(Request $request)
    {
        $foto = $request->file('foto');
        $namaFile = \Carbon\Carbon::now()->timestamp . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('asset/pengaduan/'),$namaFile);
        Pengaduan::create([
            'tgl_pengaduan' => now()->format('Y-m-d'),
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $request->foto,
        ]);
        Alert::success('Success!', 'Berhasil membuat laporan');
        return redirect()->route('masyarakat.pengaduan');
    }

    public function profile()
    {
        return view('masyarakat.profile');
    }
}
