<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Siswa | Pengaduan Sarana Sekolah</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * { box-sizing: border-box; }

        body {
            background:
                linear-gradient(rgba(13, 71, 161, 0.75), rgba(21, 101, 192, 0.75)),
                url('/images/sekolah.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            width: 420px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0,0,0,.35);
            overflow: hidden;
        }

        .register-header {
            background: linear-gradient(135deg, #0D47A1, #1976D2);
            color: #fff;
            text-align: center;
            padding: 28px;
            border-bottom: 5px solid #FFD54F;
        }

        .register-header h3 {
            margin: 0;
            font-size: 15px;
            letter-spacing: 1px;
            line-height: 1.5;
        }

        .register-body {
            padding: 26px;
            background: #F4F6FB;
        }

        .register-title {
            text-align: center;
            color: #0D47A1;
            margin-bottom: 22px;
            font-size: 18px;
            font-weight: bold;
        }

        .alert {
            text-align: center;
            font-size: 13px;
            margin-bottom: 14px;
            color: #2E7D32;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #1976D2;
        }

        .input-icon input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .input-icon input:focus {
            outline: none;
            border-color: #1976D2;
            box-shadow: 0 0 0 2px rgba(25,118,210,.15);
        }

        .btn-register {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1976D2, #0D47A1);
            border: none;
            color: #fff;
            font-size: 15px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-register:hover {
            opacity: .95;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .login-link a {
            color: #1976D2;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">

    <div class="register-header">
        <h3>
            <i class="fas fa-user-graduate fa-lg"></i><br>
            REGISTER SISWA<br>
            <strong>SMK MUHAMMADIYAH 1 BANTUL</strong>
        </h3>
    </div>

    <div class="register-body">

        <div class="register-title">
            <i class="fas fa-user-plus"></i> BUAT AKUN SISWA
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <!-- NAMA -->
            <div class="form-group input-icon">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Nama Lengkap" required>
            </div>

            <!-- EMAIL -->
            <div class="form-group input-icon">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <!-- PASSWORD -->
            <div class="form-group input-icon">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button class="btn-register">
                <i class="fas fa-user-check"></i> DAFTAR
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="/login">
                <i class="fas fa-right-to-bracket"></i> Login di sini
            </a>
        </div>

    </div>
</div>

</body>
</html>
