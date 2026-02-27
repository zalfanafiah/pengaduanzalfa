@extends('siswa.layout')

@section('title', 'Siswa | Buat Pengaduan')
@section('header', 'Buat Pengaduan')

@section('content')

<div class="card">

<form method="POST" action="/siswa/pengaduan/store">
    @csrf

    <label>Judul</label><br>
    <input type="text" name="judul" style="width:100%; padding:8px;"><br><br>

    <label>Kategori</label><br>
    <input type="text" name="kategori" style="width:100%; padding:8px;"><br><br>

    <label>Lokasi</label><br>
    <input type="text" name="lokasi" style="width:100%; padding:8px;"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" rows="4"
              style="width:100%; padding:8px;"></textarea><br><br>

    <button style="background:#2563eb; color:white;
                   padding:8px 15px; border:none; border-radius:8px;">
        Kirim
    </button>

</form>

</div>

@endsection