@extends('admin.layout')

@section('title', 'Admin | Laporan')
@section('header', 'LAPORAN DATA PENGADUAN')

@section('content')

<div class="card" id="printArea">

    <div class="card-title">
        <i class="fas fa-file-lines"></i> Laporan Pengaduan
    </div>

    <!-- FILTER -->
    <form method="GET" style="display:flex; gap:15px; align-items:end; flex-wrap:wrap; margin-bottom:20px;">
        
        <div>
            <label>Dari Tanggal</label><br>
            <input type="date" name="dari" value="{{ request('dari') }}" 
                   style="padding:8px; border-radius:8px; border:1px solid #ddd;">
        </div>

        <div>
            <label>Sampai Tanggal</label><br>
            <input type="date" name="sampai" value="{{ request('sampai') }}" 
                   style="padding:8px; border-radius:8px; border:1px solid #ddd;">
        </div>

        <div>
            <button type="submit" 
                    style="padding:10px 18px; border:none; border-radius:10px; 
                    background:#2563eb; color:white; cursor:pointer;">
                <i class="fas fa-filter"></i> Filter
            </button>
        </div>

        <div>
            <button type="button" onclick="window.print()" 
                    style="padding:10px 18px; border:none; border-radius:10px; 
                    background:#16a34a; color:white; cursor:pointer;">
                <i class="fas fa-print"></i> Cetak
            </button>
        </div>

    </form>

    <!-- ================= HEADER KHUSUS CETAK ================= -->
    <div class="print-header">
        <img src="{{ asset('musaba.png') }}" width="90">
        <h2>SMK MUHAMMADIYAH 1 BANTUL</h2>
        <p> Jl. Parangtritis KM 12 Manding, Trirenggo, Bantul, DIY</p>
        <hr>
        <h3>LAPORAN DATA PENGADUAN</h3>

        @if(request('dari') && request('sampai'))
            <p>Periode: {{ request('d-m-Y', strtotime(request('dari'))) }} 
               s/d 
               {{ request('d-m-Y', strtotime(request('sampai'))) }}</p>
        @endif
    </div>

    <!-- ================= TABLE ================= -->
    <table border="1" width="100%" cellpadding="8" cellspacing="0">
        <thead>
            <tr style="background:#f1f5ff;">
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @forelse($pengaduan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori }}</td>
                <td>{{ $p->lokasi }}</td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
                <td>{{ ucfirst($p->status) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">Tidak ada data</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- ================= TANDA TANGAN ================= -->
    <div class="print-sign">
        <p>Bantul, {{ date('d-m-Y') }}</p>
        <br><br><br>
        <p><strong>Kepala Sekolah</strong></p>
    </div>

</div>

<!-- ================= STYLE CETAK ================= -->
<style>

/* Default: sembunyikan header & tanda tangan */
.print-header,
.print-sign {
    display: none;
}

@media print {

    body {
        background: #fff !important;
    }

    /* Sembunyikan sidebar & elemen tidak perlu */
    .sidebar,
    .header,
    form,
    button,
    .card-title {
        display: none !important;
    }

    /* Hilangkan shadow */
    .card {
        box-shadow: none;
        padding: 0;
    }

    /* Tampilkan header & tanda tangan saat cetak */
    .print-header,
    .print-sign {
        display: block;
        text-align: center;
    }

    .print-header img {
        margin-bottom: 5px;
    }

    .print-sign {
        margin-top: 60px;
        text-align: right;
        padding-right: 40px;
    }

    table {
        font-size: 12px;
    }

    table th {
        background: #eee !important;
        color: #000 !important;
    }
}

</style>

@endsection