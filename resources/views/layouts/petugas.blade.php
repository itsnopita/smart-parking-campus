<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Smart Parking Petugas</title>

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
            font-family:'Poppins',sans-serif;
        }

        body{

            min-height:100vh;

            background:
            linear-gradient(
                135deg,
                #eef4ff,
                #f8fbff
            );

            overflow-x:hidden;
        }

        /* NAVBAR */
        .navbar-custom{

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #059669
            );

            padding:14px 0;

            box-shadow:
                0 10px 30px rgba(0,0,0,0.08);

            position:sticky;

            top:0;

            z-index:999;
        }

        /* LOGO */
        .navbar-brand{

            font-size:32px;

            font-weight:700;

            color:white !important;

            display:flex;

            align-items:center;

            gap:10px;
        }

        .navbar-brand i{

            font-size:34px;
        }

        /* USER BOX */
        .user-box{

            display:flex;

            align-items:center;

            gap:14px;
        }

        .user-info{

            text-align:right;
        }

        .user-name{

            color:white;

            font-weight:700;

            font-size:20px;

            line-height:1.1;
        }

        /* LOGOUT */
        .btn-logout{

            background:#ef4444;

            color:white;

            border:none;

            padding:10px 18px;

            border-radius:14px;

            font-weight:600;

            transition:0.3s;

            display:flex;

            align-items:center;

            gap:8px;
        }

        .btn-logout:hover{

            background:#dc2626;

            transform:translateY(-2px);

            color:white;
        }

        /* CONTENT */
        .main-content{

            padding:22px 20px;
        }

        /* RESPONSIVE */
        @media(max-width:768px){

            .navbar-brand{

                font-size:22px;
            }

            .navbar-brand i{

                font-size:24px;
            }

            .user-name{

                font-size:16px;
            }

            .btn-logout{

                padding:8px 14px;

                font-size:13px;
            }

            .user-box{

                gap:8px;
            }

        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container-fluid px-4">

        <!-- LOGO -->
        <a class="navbar-brand"
           href="/petugas">

            <i class="bi bi-car-front-fill"></i>

            Smart Parking

        </a>

        <!-- USER -->
        <div class="user-box">

            <div class="user-info">

                <div class="user-name">

                    {{ auth()->user()->nama }}

                </div>

            </div>

            <!-- LOGOUT -->
            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="btn-logout">

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<div class="main-content">

    @yield('content')

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>