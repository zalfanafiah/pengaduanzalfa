@extends('siswa.layout')

@section('title', 'Siswa | Dashboard')
@section('header', 'Dashboard')

@section('content')

<div class="card">
    <h2 style="margin-top:0; color:#1e3a8a;">
        👋 Selamat Datang, {{ session('user_name') }}!
    </h2>

    <p style="color:#555; font-size:15px;">
        Senang melihat kamu kembali 👏<br>
        Di sini kamu bisa melihat dan mengirim pengaduan dengan mudah.
    </p>
</div>

<div class="card">
    <h3 style="color:#1e3a8a;">📌 Informasi</h3>
    <ul style="color:#555; line-height:1.8;">
        <li>Kamu dapat membuat pengaduan baru</li>
        <li>Lihat status pengaduan yang sudah dikirim</li>
        <li>Pastikan data yang kamu isi sudah benar</li>
    </ul>
</div>

@endsection