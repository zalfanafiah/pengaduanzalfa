<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminPengaduanController extends Controller
{
    // =========================
    // LIST PENGADUAN + FILTER TANGGAL
    // =========================
    public function index(Request $request)
    {
        $query = Pengaduan::with('user');

        // FILTER TANGGAL
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('created_at', [
                $request->tanggal_awal . ' 00:00:00',
                $request->tanggal_akhir . ' 23:59:59'
            ]);
        }

        $data = $query->orderBy('created_at', 'desc')->get();

        return view('admin.pengaduan.index', compact('data'));
    }

    // =========================
    // DETAIL PENGADUAN
    // =========================
    public function show($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    // =========================
    // UPDATE STATUS & TANGGAPAN
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'tanggapan_admin' => 'nullable'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => $request->status,
            'tanggapan_admin' => $request->tanggapan_admin
        ]);

        return redirect('/admin/pengaduan/' . $id)
               ->with('success', 'Pengaduan berhasil diperbarui');
    }
}