<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body{
            margin:0;
            font-family:'Segoe UI',sans-serif;
            background:#f4f7fe;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:100px;
            background:linear-gradient(180deg,#1e3a8a,#2563eb);
            display:flex;
            flex-direction:column;
            align-items:center;
            padding:20px 0;
            color:white;
        }

        .logo{
            font-size:40px;
            margin-bottom:10px;
        }

        .username{
            font-size:12px;
            text-align:center;
            margin-bottom:30px;
            line-height:1.4;
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
            transition:.3s;
            position:relative;
        }

        .menu a:hover{
            background:rgba(255,255,255,.25);
            color:#fff;
        }

        .menu a.active{
            background:rgba(255,255,255,.35);
        }

        .menu a span{
            position:absolute;
            left:80px;
            background:#1e3a8a;
            color:#fff;
            padding:6px 14px;
            border-radius:10px;
            font-size:13px;
            opacity:0;
            transition:.2s;
        }

        .menu a:hover span{
            opacity:1;
        }

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
            justify-content:space-between;
            align-items:center;
        }

        .header h2{
            margin:0;
            color:#1e3a8a;
        }

        .card{
            background:#fff;
            border-radius:18px;
            padding:25px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            padding:12px;
            border-bottom:1px solid #eee;
        }

        th{
            background:#f1f5ff;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            <i class="fas fa-user"></i>
        </div>

        <!-- 🔥 NAMA SISWA -->
        <div class="username">
            Halo,<br>
            <strong>{{ session('user_name') }}</strong>
        </div>

        <div class="menu">

            <a href="/siswa/dashboard"
               class="{{ request()->is('siswa/dashboard') ? 'active' : '' }}">
                <i class="fas fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="/siswa/pengaduan"
               class="{{ request()->is('siswa/pengaduan*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Pengaduan</span>
            </a>

            <a href="/siswa/pengaduan/create">
                <i class="fas fa-plus"></i>
                <span>Buat</span>
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

            <!-- 🔥 NAMA DI HEADER -->
            <div>
                👤 {{ session('user_name') }}
            </div>
        </div>

        @yield('content')

    </div>

</div>

</body>
</html>