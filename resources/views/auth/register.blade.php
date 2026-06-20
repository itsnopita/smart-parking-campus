<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register Smart Parking</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:30px 20px;

            overflow-y:auto;

            position:relative;

            background:
            linear-gradient(
                135deg,
                #bfdbfe,
                #dbeafe,
                #dcfce7
            );
        }

        /* BLUR BACKGROUND */
        .blur1{

            position:fixed;

            width:350px;
            height:350px;

            background:#3b82f6;

            border-radius:50%;

            filter:blur(120px);

            opacity:0.20;

            top:-120px;
            left:-120px;

            z-index:1;
        }

        .blur2{

            position:fixed;

            width:350px;
            height:350px;

            background:#22c55e;

            border-radius:50%;

            filter:blur(120px);

            opacity:0.20;

            bottom:-120px;
            right:-120px;

            z-index:1;
        }

        /* REGISTER BOX */
        .register-box{

            position:relative;

            z-index:10;

            width:100%;
            max-width:480px;

            padding:42px 38px;

            background:rgba(255,255,255,0.68);

            border:1px solid rgba(255,255,255,0.8);

            backdrop-filter:blur(18px);

            border-radius:30px;

            box-shadow:
                0 25px 50px rgba(37,99,235,0.14),
                0 10px 25px rgba(0,0,0,0.06);

            color:#1e293b;

            animation:fadeUp 0.8s ease;
        }

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:translateY(35px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        /* LOGO */
        .logo{

            width:95px;
            height:95px;

            margin:auto;
            margin-bottom:22px;

            border-radius:50%;

            display:flex;
            justify-content:center;
            align-items:center;

            background:linear-gradient(
                135deg,
                #2563eb,
                #22c55e
            );

            font-size:42px;

            color:white;

            box-shadow:
                0 12px 30px rgba(37,99,235,0.25);

            animation:float 3s ease-in-out infinite;
        }

        @keyframes float{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-8px);
            }

            100%{
                transform:translateY(0px);
            }
        }

        /* TITLE */
        .title{

            text-align:center;

            font-size:40px;

            font-weight:700;

            margin-bottom:6px;

            color:#0f172a;
        }

        .subtitle{

            text-align:center;

            font-size:16px;

            color:#64748b;

            margin-bottom:35px;
        }

        /* LABEL */
        .form-label{

            margin-bottom:10px;

            font-weight:500;

            color:#334155;
        }

        /* INPUT */
        .form-control{

            background:rgba(255,255,255,0.78);

            border:2px solid #dbeafe;

            color:#0f172a;

            padding:14px 18px;

            border-radius:16px;

            font-size:16px;

            transition:0.3s;
        }

        .form-control::placeholder{

            color:#94a3b8;
        }

        .form-control:focus{

            background:white;

            color:#0f172a;

            border-color:#2563eb;

            box-shadow:
                0 0 0 4px rgba(37,99,235,0.12);
        }

        /* BUTTON */
        .btn-register{

            width:100%;

            padding:15px;

            border:none;

            border-radius:16px;

            font-size:18px;

            font-weight:600;

            color:white;

            background:linear-gradient(
                135deg,
                #2563eb,
                #16a34a
            );

            transition:0.35s;

            box-shadow:
                0 10px 25px rgba(37,99,235,0.18);
        }

        .btn-register:hover{

            transform:
                translateY(-3px)
                scale(1.01);

            opacity:0.95;
        }

        /* LOGIN LINK */
        .login-link{

            text-align:center;

            margin-top:22px;

            color:#475569;

            font-size:15px;
        }

        .login-link a{

            color:#2563eb;

            text-decoration:none;

            font-weight:600;
        }

        .login-link a:hover{

            color:#16a34a;
        }

        /* MOBILE */
        @media(max-width:768px){

            .register-box{

                padding:36px 24px;

                border-radius:26px;
            }

            .title{

                font-size:34px;
            }

            .logo{

                width:82px;
                height:82px;

                font-size:35px;
            }

        }

    </style>

</head>

<body>

<!-- BLUR -->
<div class="blur1"></div>
<div class="blur2"></div>

<!-- REGISTER BOX -->
<div class="register-box">

    <!-- LOGO -->
    <div class="logo">

        <i class="bi bi-car-front-fill"></i>

    </div>

    <!-- TITLE -->
    <div class="title">

        Smart Parking

    </div>

    <!-- SUBTITLE -->
    <div class="subtitle">

        Registrasi Mahasiswa Parkir

    </div>

    <!-- FORM -->
    <form method="POST"
          action="{{ route('register') }}">

        @csrf

        <!-- NAMA -->
        <div class="mb-3">

            <label class="form-label">

                Nama

            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Masukkan nama lengkap"
                   required>

        </div>

        <!-- EMAIL -->
        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   required>

        </div>

        <!-- PASSWORD -->
        <div class="mb-3">

            <label class="form-label">

                Password

            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>

        </div>

        <!-- KONFIRMASI PASSWORD -->
        <div class="mb-4">

            <label class="form-label">

                Konfirmasi Password

            </label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   placeholder="Ulangi password"
                   required>

        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="btn-register">

            <i class="bi bi-person-plus-fill"></i>

            Register

        </button>

        <!-- LOGIN LINK -->
        <div class="login-link">

            Sudah punya akun?

            <a href="/login">

                Login

            </a>

        </div>

    </form>

</div>

</body>
</html>