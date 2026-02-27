@extends('siswa.layout')

@section('title', 'Siswa | Pengaduan')
@section('header', 'Pengaduan Saya')

@section('content')

@if(session('success'))
<div class="card" style="background:green; color:white; margin-bottom:15px;">
    {{ session('success') }}
</div>
@endif

<div class="card">

    <a href="/siswa/pengaduan/create"
       style="display:inline-block; margin-bottom:15px;
              background:#2563eb; color:white;
              padding:8px 15px; border-radius:8px; text-decoration:none;">
        + Buat Pengaduan
    </a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        @forelse($pengaduan as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->kategori }}</td>
            <td>{{ ucfirst($p->status) }}</td>
            <td>{{ $p->created_at->format('d-m-Y') }}</td>
            <td>
                <a href="/siswa/pengaduan/{{ $p->id }}">Detail</a> |
                <a href="/siswa/pengaduan/delete/{{ $p->id }}"
                   onclick="return confirm('Yakin hapus?')">
                   Hapus
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align:center;">
                Belum ada pengaduan
            </td>
        </tr>
        @endforelse
    </table>

    <br>
    {{ $pengaduan->links() }}

</div>

@endsection