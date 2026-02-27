@extends('siswa.layout')

@section('title', 'Detail Pengaduan')
@section('header', 'Detail Pengaduan')

@section('content')

<style>
    .badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-menunggu {
        background: #fff3cd;
        color: #856404;
    }

    .badge-diproses {
        background: #cce5ff;
        color: #004085;
    }

    .badge-selesai {
        background: #d4edda;
        color: #155724;
    }

    .badge-ditolak {
        background: #f8d7da;
        color: #721c24;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        display: inline-block;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn:hover {
        opacity: 0.85;
    }
</style>

<div class="card">

    <h3 style="margin-top:0; color:#1e3a8a;">
        {{ $pengaduan->judul }}
    </h3>

    <table>
        <tr>
            <th width="200">Kategori</th>
            <td>{{ $pengaduan->kategori }}</td>
        </tr>

        <tr>
            <th>Lokasi</th>
            <td>{{ $pengaduan->lokasi }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                @if($pengaduan->status == 'menunggu')
                    <span class="badge badge-menunggu">Menunggu</span>

                @elseif($pengaduan->status == 'diproses')
                    <span class="badge badge-diproses">Diproses</span>

                @elseif($pengaduan->status == 'selesai')
                    <span class="badge badge-selesai">Selesai</span>

                @elseif($pengaduan->status == 'ditolak')
                    <span class="badge badge-ditolak">Ditolak</span>
                @endif
            </td>
        </tr>

        <tr>
            <th>Deskripsi</th>
            <td>{{ $pengaduan->deskripsi }}</td>
        </tr>

        <tr>
            <th>Tanggal Dibuat</th>
            <td>{{ $pengaduan->created_at->format('d M Y H:i') }}</td>
        </tr>
    </table>

    <br>

    <a href="/siswa/pengaduan" class="btn btn-primary">
        ← Kembali
    </a>

    <a href="/siswa/pengaduan/delete/{{ $pengaduan->id }}"
       onclick="return confirm('Yakin ingin menghapus pengaduan ini?')"
       class="btn btn-danger">
        Hapus
    </a>

</div>

@endsection