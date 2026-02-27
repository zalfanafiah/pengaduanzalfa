<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query();

        // Filter berdasarkan tanggal
        if ($request->dari && $request->sampai) {
            $query->whereBetween('created_at', [
                $request->dari . ' 00:00:00',
                $request->sampai . ' 23:59:59'
            ]);
        }

        $pengaduan = $query->latest()->get();

        return view('admin.laporan', compact('pengaduan'));
    }
}