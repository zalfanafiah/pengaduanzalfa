@extends('admin.layout')

@section('title','Admin | Dashboard')
@section('header','Dashboard Admin')

@section('content')

<style>
.dashboard{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
    margin-bottom:30px;
}

.card{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:#fff;
    padding:30px;
    border-radius:20px;
    position:relative;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(37,99,235,.4);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
}

.card i{
    font-size:70px;
    position:absolute;
    right:20px;
    bottom:10px;
    opacity:.25;
}

.card h4{
    margin:0;
    font-weight:normal;
    letter-spacing:.5px;
}

.card h1{
    margin:10px 0 0;
    font-size:40px;
}

/* ================= LIST ================= */
.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:25px;
}

.list-card{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.list-title{
    font-size:18px;
    font-weight:600;
    color:#1e3a8a;
    margin-bottom:20px;
    display:flex;
    align-items:center;
    gap:10px;
}

.list-title i{
    color:#2563eb;
}

.list-item{
    padding:12px 0;
    border-bottom:1px solid #eee;
}

.list-item:last-child{
    border-bottom:none;
}

.list-item h5{
    margin:0;
    font-size:14px;
    color:#1e3a8a;
}

.list-item span{
    font-size:12px;
    color:#6b7280;
}
</style>

<!-- STATISTIK -->
<div class="dashboard">
    <div class="card">
        <h4>Total Siswa</h4>
        <h1>{{ $totalSiswa }}</h1>
        <i class="fas fa-user-graduate"></i>
    </div>

    <div class="card">
        <h4>Total Admin</h4>
        <h1>{{ $totalAdmin }}</h1>
        <i class="fas fa-user-shield"></i>
    </div>

    <div class="card">
        <h4>Total Pengaduan</h4>
        <h1>{{ $totalPengaduan }}</h1>
        <i class="fas fa-clipboard-list"></i>
    </div>
</div>

<!-- DATA TERBARU -->
<div class="grid-2">

    <!-- Pengaduan Terbaru -->
    <div class="list-card">
        <div class="list-title">
            <i class="fas fa-clipboard-list"></i> Pengaduan Terbaru
        </div>

        @forelse($pengaduanTerbaru as $p)
            <div class="list-item">
                <h5>{{ $p->judul }}</h5>
                <span>{{ $p->created_at->format('d M Y') }}</span>
            </div>
        @empty
            <span>Tidak ada pengaduan</span>
        @endforelse
    </div>

    <!-- Siswa Terbaru -->
    <div class="list-card">
        <div class="list-title">
            <i class="fas fa-user-graduate"></i> Siswa Terbaru
        </div>

        @forelse($siswaTerbaru as $s)
            <div class="list-item">
                <h5>{{ $s->name }}</h5>
                <span>{{ $s->email }}</span>
            </div>
        @empty
            <span>Tidak ada data siswa</span>
        @endforelse
    </div>

</div>

@endsection