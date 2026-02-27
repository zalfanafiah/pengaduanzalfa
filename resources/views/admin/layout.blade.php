<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --blue1:#1e3a8a;
            --blue2:#2563eb;
            --blue3:#3b82f6;
        }

        *{
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            margin:0;
            background:#f4f7fe;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        /* ================= SIDEBAR ================= */
        .sidebar{
            width:90px;
            background:linear-gradient(180deg,var(--blue1),var(--blue2));
            display:flex;
            flex-direction:column;
            align-items:center;
            padding:20px 0;
            box-shadow:4px 0 20px rgba(37,99,235,.3);
            position:relative;
            z-index:100;
        }

        .logo{
            font-size:40px;
            color:#fff;
            margin-bottom:40px;
            animation:pulse 3s infinite;
        }

        @keyframes pulse{
            0%{transform:scale(1)}
            50%{transform:scale(1.1)}
            100%{transform:scale(1)}
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:18px;
        }

        .menu a{
            width:52px;
            height:52px;
            border-radius:16px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#e0e7ff;
            text-decoration:none;
            position:relative;
            transition:.3s;
        }

        .menu a i{
            font-size:18px;
        }

        .menu a:hover{
            background:rgba(255,255,255,.25);
            color:#fff;
            box-shadow:0 0 15px rgba(255,255,255,.5);
            transform:translateY(-3px);
        }

        .menu a.active{
            background:rgba(255,255,255,.35);
            color:#fff;
            box-shadow:0 0 18px rgba(255,255,255,.7);
        }

        /* ================= TOOLTIP ================= */
        .menu a span{
            position:absolute;
            left:80px;
            background:#1e3a8a;
            color:#fff;
            padding:6px 14px;
            border-radius:10px;
            font-size:13px;
            white-space:nowrap;
            opacity:0;
            transform:translateX(-8px);
            transition:.25s ease;
            pointer-events:none;
            box-shadow:0 8px 20px rgba(0,0,0,.25);
        }

        .menu a span::before{
            content:'';
            position:absolute;
            left:-6px;
            top:50%;
            transform:translateY(-50%);
            border-width:6px;
            border-style:solid;
            border-color:transparent #1e3a8a transparent transparent;
        }

        .menu a:hover span{
            opacity:1;
            transform:translateX(0);
        }

        /* ================= CONTENT ================= */
        .content{
            flex:1;
            padding:30px;
        }

        .header{
            background:#fff;
            padding:20px 30px;
            border-radius:16px;
            margin-bottom:30px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .header h2{
            margin:0;
            font-size:22px;
            color:#1e3a8a;
        }

        /* ================= CARD ================= */
        .card{
            background:#fff;
            border-radius:18px;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            margin-bottom:25px;
        }

        .card-title{
            font-size:18px;
            font-weight:600;
            color:#1e3a8a;
            margin-bottom:20px;
            display:flex;
            align-items:center;
            gap:10px;
        }

        .card-title i{
            color:var(--blue3);
        }

        /* ================= TABLE ================= */
        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#f1f5ff;
            text-align:left;
            padding:12px;
            color:#1e3a8a;
            font-size:14px;
        }

        table td{
            padding:12px;
            border-bottom:1px solid #eee;
            font-size:14px;
        }

        table tr:hover{
            background:#f9fbff;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-school"></i>
        </div>

        <div class="menu">

            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="/admin/pengaduan" class="{{ request()->is('admin/pengaduan*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Pengaduan</span>
            </a>

            <a href="/admin/siswa" class="{{ request()->is('admin/siswa*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <span>Siswa</span>
            </a>

            <!-- MENU LAPORAN BARU -->
            <a href="/admin/laporan" class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">
                <i class="fas fa-file-lines"></i>
                <span>Laporan</span>
            </a>

            <a href="/logout">
                <i class="fas fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>

        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="header">
            <h2>@yield('header')</h2>
        </div>

        @yield('content')
    </div>

</div>

</body>
</html>