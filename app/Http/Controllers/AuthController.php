<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        return redirect('/login')->with('success', 'Register berhasil');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,siswa'
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', $request->role)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Login gagal');
        }

        session([
            'login' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'role' => $user->role
        ]);

        // 🔥 INI PENTING
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/siswa/pengaduan');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}