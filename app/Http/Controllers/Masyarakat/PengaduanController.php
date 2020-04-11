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
    public function __construct()
    {
        $this->middleware('auth:masyarakat');
    }

    public function index()
    {
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik', '=', 'pengaduans.nik')
        ->select('pengaduans.*', 'masyarakats.nama')
        ->where('pengaduans.nik', Auth::user()->nik)
        ->latest('tgl_pengaduan')
        ->paginate(4);

        $countSem = Pengaduan::latest()->get();
        $countKu = $pengaduans;

        return view('masyarakat.pengaduan.user', compact('pengaduans', 'countKu', 'countSem'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('pengaduans.nik','like',"%".$search."%")
        ->where('status', 'selesai')
        ->orWhere('masyarakats.nama','like',"%".$search."%")
        ->where('status', 'selesai')
        ->orWhere('pengaduans.judul','like',"%".$search."%")
        ->where('status', 'selesai')
        ->paginate(5);

        $countSem = Pengaduan::latest()->get();
        $countKu = $pengaduans;

        Alert::success('Success!', 'Berhasil mencari data');
        return view('masyarakat.pengaduan.user', compact('pengaduans', 'countKu', 'countSem'));
    }

    public function index2()
    {
        $pengaduans = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('status', 'selesai')
        ->latest('tgl_pengaduan')
        ->paginate(5);

        $countKu = Pengaduan::where('pengaduans.nik', Auth::user()->nik)->get();
        $countSem = Pengaduan::latest()->get();

        return view('masyarakat.pengaduan.semua', compact('pengaduans', 'countKu', 'countSem'));
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::join('masyarakats', 'masyarakats.nik' ,'=','pengaduans.nik')
        ->select('pengaduans.*','masyarakats.nama')
        ->where('id_pengaduan', $id)
        ->get()->first();

        $tanggapans = Tanggapan::join('petugas', 'petugas.id_petugas', '=', 'tanggapans.id_petugas')
        ->select('tanggapans.*','petugas.nama_petugas')
        ->where('tanggapans.id_pengaduan', $id)
        ->get();

        $countKu = Pengaduan::where('pengaduans.nik', Auth::user()->nik)->get();
        $countSem = Pengaduan::latest()->get();
        $prev = Pengaduan::where('status', 'selesai')->where('id_pengaduan', '<', $id)->max('id_pengaduan');
        $prevContent = Pengaduan::where('id_pengaduan', $prev)->get()->first();
        $next = Pengaduan::where('status', 'selesai')->where('id_pengaduan', '>', $id)->min('id_pengaduan');
        $nextContent = Pengaduan::where('id_pengaduan', $next)->get()->first();

        return view('masyarakat.pengaduan.detail', compact('pengaduan', 'tanggapans', 'prevContent', 'nextContent', 'countKu', 'countSem'));
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
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $namaFile,
        ]);
        Alert::success('Success!', 'Berhasil membuat laporan');
        return redirect()->route('masyarakat.pengaduan');
    }

    public function profile()
    {
        return view('masyarakat.profile');
    }
}
