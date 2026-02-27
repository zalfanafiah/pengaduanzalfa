@extends('admin.layout')

@section('title', 'Admin | Data Siswa')
@section('header', 'DATA SISWA')

@section('content')

<div class="card">

    <div class="card-title">
        <i class="fas fa-user-graduate"></i> Data Siswa
    </div>

    <!-- SEARCH -->
    <form method="GET" style="display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap;">
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Cari nama / email siswa"
               style="padding:8px 12px; border-radius:8px; border:1px solid #ccc; width:260px;">

        <button style="padding:8px 16px; border:none; border-radius:8px; 
                       background:#2563eb; color:white; cursor:pointer;">
            <i class="fas fa-search"></i> Cari
        </button>

        <a href="/admin/siswa"
           style="padding:8px 16px; border-radius:8px; background:#9E9E9E;
                  color:white; text-decoration:none;">
            Reset
        </a>
    </form>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>
                    <form action="/admin/siswa/{{ $item->id }}" method="POST"
                          onsubmit="return confirm('Yakin mau hapus siswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button style="background:#dc2626; border:none; 
                                       color:white; padding:6px 12px; 
                                       border-radius:8px; cursor:pointer;">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:30px; color:#888;">
                    <i class="fas fa-user-slash"></i><br>
                    Data siswa belum ada
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection