<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class SiswaPengaduanController extends Controller
{
    public function dashboard()
    {
        $userId = session('user_id'); // 🔥 FIX DI SINI

        $totalPengaduan = Pengaduan::where('user_id', $userId)->count();

        $diproses = Pengaduan::where('user_id', $userId)
                    ->where('status', 'diproses')
                    ->count();

        $selesai = Pengaduan::where('user_id', $userId)
                    ->where('status', 'selesai')
                    ->count();

        $pengaduanTerbaru = Pengaduan::where('user_id', $userId)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('siswa.dashboard', compact(
            'totalPengaduan',
            'diproses',
            'selesai',
            'pengaduanTerbaru'
        ));
    }

    public function index()
    {
        $userId = session('user_id'); // 🔥 FIX DI SINI

        $pengaduan = Pengaduan::where('user_id', $userId)
                    ->latest()
                    ->paginate(10);

        return view('siswa.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        return view('siswa.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ]);

        Pengaduan::create([
            'user_id' => session('user_id'), // 🔥 FIX DI SINI
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'status' => 'menunggu',
        ]);

        return redirect('/siswa/pengaduan')
                ->with('success', 'Pengaduan berhasil dikirim');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('user_id', session('user_id'))
                        ->findOrFail($id);

        return view('siswa.pengaduan.show', compact('pengaduan'));
    }

    public function delete($id)
    {
        $pengaduan = Pengaduan::where('user_id', session('user_id'))
                        ->findOrFail($id);

        $pengaduan->delete();

        return redirect('/siswa/pengaduan')
                ->with('success', 'Pengaduan berhasil dihapus');
    }
}