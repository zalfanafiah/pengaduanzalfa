<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $siswa = User::where('role', 'siswa')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->latest()
            ->get();

        return view('admin.siswa', compact('siswa'));
    }

    public function destroy($id)
    {
        $siswa = User::where('role','siswa')->findOrFail($id);
        $siswa->delete();

        return redirect('/admin/siswa')->with('success','Data siswa berhasil dihapus');
    }
}