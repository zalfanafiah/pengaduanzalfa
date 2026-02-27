<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengaduan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role','siswa')->count();
        $totalAdmin = User::where('role','admin')->count();
        $totalPengaduan = Pengaduan::count();

        $pengaduanTerbaru = Pengaduan::latest()->take(5)->get();
        $siswaTerbaru = User::where('role','siswa')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalAdmin',
            'totalPengaduan',
            'pengaduanTerbaru',
            'siswaTerbaru'
        ));
    }
}