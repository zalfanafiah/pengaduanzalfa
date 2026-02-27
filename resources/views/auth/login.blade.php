<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Pengaduan Sarana Sekolah</title>

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
            transition: background 0.6s ease;
        }

        .login-box {
            width: 400px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 25px 50px rgba(0,0,0,.35);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, #0D47A1, #1976D2);
            color: #fff;
            text-align: center;
            padding: 28px;
            border-bottom: 5px solid #FFD54F;
        }

        .login-header h3 {
            margin: 0;
            font-size: 15px;
            letter-spacing: 1px;
            line-height: 1.5;
        }

        .login-body {
            padding: 26px;
            background: #F4F6FB;
        }

        .login-title {
            text-align: center;
            color: #0D47A1;
            margin-bottom: 22px;
            font-size: 18px;
        }

        .role-select {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .role-select label {
            flex: 1;
            border: 2px solid #1976D2;
            border-radius: 12px;
            cursor: pointer;
            text-align: center;
            transition: .3s;
            background: #fff;
        }

        .role-select input { display: none; }

        .role-select span {
            display: block;
            padding: 14px;
            font-weight: bold;
            color: #1976D2;
        }

        .role-select input:checked + span {
            background: #1976D2;
            color: #fff;
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

        .btn-login {
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

        .btn-login:hover {
            opacity: .95;
        }

        .alert {
            text-align: center;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .alert-error { color: #D32F2F; }
        .alert-success { color: #2E7D32; }

        .register-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
        }

        .register-link a {
            color: #1976D2;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-box">

    <div class="login-header">
        <h3>
            <i class="fas fa-school fa-lg"></i><br>
            PENGADUAN SARANA SEKOLAH<br>
            <strong>SMK MUHAMMADIYAH 1 BANTUL</strong>
        </h3>
    </div>

    <div class="login-body">

        <div class="login-title">
            <i class="fas fa-right-to-bracket"></i> LOGIN SISTEM
        </div>

        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <!-- PILIH ROLE -->
            <div class="role-select">
                <label>
                    <input type="radio" name="role" value="admin" onclick="setAdminBg()" required>
                    <span><i class="fas fa-user-tie"></i> ADMIN</span>
                </label>
                <label>
                    <input type="radio" name="role" value="siswa" onclick="setSiswaBg()">
                    <span><i class="fas fa-user-graduate"></i> SISWA</span>
                </label>
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

            <button class="btn-login">
                <i class="fas fa-sign-in-alt"></i> MASUK
            </button>
        </form>

        <div class="register-link">
            Belum punya akun siswa?
            <a href="/register">
                <i class="fas fa-user-plus"></i> Register di sini
            </a>
        </div>

    </div>
</div>

<script>
    function setAdminBg() {
        document.body.style.background =
            "linear-gradient(rgba(13,71,161,.8), rgba(13,71,161,.8)), url('/images/kantor.jpg') center/cover fixed";
    }

    function setSiswaBg() {
        document.body.style.background =
            "linear-gradient(rgba(25,118,210,.75), rgba(25,118,210,.75)), url('/images/sekolah.jpg') center/cover fixed";
    }
</script>

</body>
</html>
