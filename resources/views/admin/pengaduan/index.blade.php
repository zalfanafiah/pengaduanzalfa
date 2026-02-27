@extends('admin.layout')

@section('title','Admin | Data Pengaduan')
@section('header','Data Pengaduan')

@section('content')

<style>
.card{
    background:#fff;
    border-radius:18px;
    box-shadow:0 15px 30px rgba(0,0,0,.12);
    padding:25px;
}

.card-title{
    font-size:18px;
    color:#1e3a8a;
    margin-bottom:20px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:10px;
}

/* FILTER */
.filter-box{
    display:flex;
    gap:15px;
    margin-bottom:25px;
    align-items:flex-end;
    flex-wrap:wrap;
}

.filter-box label{
    font-size:13px;
    font-weight:600;
}

.filter-box input{
    padding:8px 10px;
    border-radius:8px;
    border:1px solid #ccc;
}

.btn{
    background:linear-gradient(135deg,#2563eb,#1e3a8a);
    color:#fff;
    padding:8px 16px;
    border-radius:10px;
    border:none;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    text-decoration:none;
}

.btn-reset{
    background:#9ca3af;
}

table{
    width:100%;
    border-collapse:collapse;
    font-size:14px;
}

thead{
    background:#2563eb;
    color:#fff;
}

th,td{
    padding:12px;
    text-align:center;
}

tbody tr:nth-child(even){
    background:#f1f5ff;
}

tbody tr:hover{
    background:#e3f2fd;
}

/* STATUS */
.status{
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.status.baru{
    background:#e3f2fd;
    color:#1565c0;
}

.status.proses{
    background:#fff3cd;
    color:#856404;
}

.status.selesai{
    background:#d4edda;
    color:#2e7d32;
}

.foto{
    width:70px;
    border-radius:10px;
    box-shadow:0 5px 10px rgba(0,0,0,.2);
}

.empty{
    text-align:center;
    padding:30px;
    color:#9ca3af;
}
</style>

<div class="card">

    <div class="card-title">
        <i class="fas fa-clipboard-list"></i> Daftar Pengaduan Masuk
    </div>

    <!-- FILTER -->
    <form method="GET" class="filter-box">
        <div>
            <label>Tanggal Awal</label><br>
            <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
        </div>

        <div>
            <label>Tanggal Akhir</label><br>
            <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
        </div>

        <div>
            <button class="btn">
                <i class="fas fa-filter"></i> Filter
            </button>
            <a href="/admin/pengaduan" class="btn btn-reset">Reset</a>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->judul }}</td>
                <td>
                    <span class="status {{ strtolower($item->status) }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>
                    @if($item->foto)
                        <img src="{{ asset('uploads/'.$item->foto) }}" class="foto">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="/admin/pengaduan/{{ $item->id }}" class="btn">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="empty">
                    <i class="fas fa-inbox"></i><br>
                    Belum ada pengaduan
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection