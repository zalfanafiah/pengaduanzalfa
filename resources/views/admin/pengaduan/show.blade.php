<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Detail Pengaduan</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #EEF3FB;
        }

        .header {
            background: linear-gradient(135deg, #0D47A1, #1976D2);
            color: #fff;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            color: #FFD54F;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 30px;
            display: flex;
            justify-content: center;
        }

        .card {
            width: 800px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 25px 50px rgba(0,0,0,.2);
            padding: 30px;
        }

        .card h3 {
            text-align: center;
            color: #0D47A1;
            margin-top: 0;
            margin-bottom: 25px;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .box {
            background: #F4F7FF;
            padding: 14px;
            border-radius: 12px;
        }

        .box label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 4px;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .menunggu { background: #E3F2FD; color: #1565C0; }
        .diproses { background: #FFF3CD; color: #856404; }
        .selesai  { background: #D4EDDA; color: #2E7D32; }
        .ditolak  { background: #F8D7DA; color: #721C24; }

        .foto {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 14px;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,.25);
        }

        .form-group {
            margin-top: 18px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        select:focus,
        textarea:focus {
            outline: none;
            border-color: #1976D2;
            box-shadow: 0 0 0 2px rgba(25,118,210,.15);
        }

        .btn-save {
            margin-top: 20px;
            padding: 12px 22px;
            background: linear-gradient(135deg, #1976D2, #0D47A1);
            border: none;
            color: #fff;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-save:hover {
            opacity: .95;
        }

        .success {
            background: #D4EDDA;
            color: #155724;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <h2><i class="fas fa-file-circle-exclamation"></i> Detail Pengaduan</h2>
    <a href="/admin/pengaduan">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="container">
    <div class="card">

        <h3>{{ $pengaduan->judul }}</h3>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <div class="info">
            <div class="box">
                <label>Nama Siswa</label>
                {{ $pengaduan->user->name }}
            </div>

            <div class="box">
                <label>Status</label>
                <span class="status {{ $pengaduan->status }}">
                    {{ ucfirst($pengaduan->status) }}
                </span>
            </div>
        </div>

        <div class="box">
            <label>Deskripsi Pengaduan</label>
            <p>{{ $pengaduan->deskripsi }}</p>
        </div>

        @if($pengaduan->foto)
            <img src="{{ asset('uploads/'.$pengaduan->foto) }}" class="foto">
        @endif

        <form method="POST" action="/admin/pengaduan/update/{{ $pengaduan->id }}">
            @csrf

            <div class="form-group">
                <label>Ubah Status</label>
                <select name="status">
                    <option value="menunggu" {{ $pengaduan->status=='menunggu'?'selected':'' }}>Menunggu</option>
                    <option value="diproses" {{ $pengaduan->status=='diproses'?'selected':'' }}>Diproses</option>
                    <option value="selesai" {{ $pengaduan->status=='selesai'?'selected':'' }}>Selesai</option>
                    <option value="ditolak" {{ $pengaduan->status=='ditolak'?'selected':'' }}>Ditolak</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggapan Admin</label>
                <textarea name="tanggapan_admin" placeholder="Tulis tanggapan admin...">{{ $pengaduan->tanggapan_admin }}</textarea>
            </div>

            <button type="submit" class="btn-save">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </form>

    </div>
</div>

</body>
</html>
