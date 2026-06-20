<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Smart Parking</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            min-height:100vh;

            font-family:Arial,sans-serif;

            background:
            linear-gradient(
                135deg,
                #dbeafe,
                #dcfce7,
                #ecfeff
            );

            color:#0f172a;

            overflow-x:hidden;
        }

        /* SIDEBAR */
        .sidebar{

            width:260px;

            min-height:100vh;

            position:fixed;

            top:0;
            left:0;

            background:rgba(255,255,255,0.7);

            backdrop-filter:blur(18px);

            border-right:1px solid rgba(255,255,255,0.5);

            padding:30px 20px;

            box-shadow:
            0 10px 30px rgba(0,0,0,0.05);

            z-index:1000;
        }

        .logo{

            font-size:32px;

            font-weight:bold;

            margin-bottom:40px;

            color:#0f172a;
        }

        .logo i{
            color:#2563eb;
        }

        .menu-title{

            color:#64748b;

            font-size:13px;

            margin-bottom:15px;

            text-transform:uppercase;

            letter-spacing:1px;
        }

        .menu a{

            display:flex;

            align-items:center;

            gap:12px;

            padding:14px 16px;

            margin-bottom:12px;

            border-radius:18px;

            color:#334155;

            text-decoration:none;

            font-weight:600;

            transition:0.3s;
        }

        .menu a:hover{

            background:
            linear-gradient(
                135deg,
                #3b82f6,
                #22c55e
            );

            color:white;

            transform:translateX(4px);
        }

        .menu .active{

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #16a34a
            );

            color:white;

            box-shadow:
            0 10px 25px rgba(37,99,235,0.25);
        }

        /* MAIN */
        .main-content{

            margin-left:260px;

            padding:30px;
        }

        /* TOPBAR */
        .topbar{

            display:flex;

            justify-content:space-between;

            align-items:center;

            margin-bottom:30px;
        }

        .profile-box{

            background:white;

            padding:14px 18px;

            border-radius:20px;

            display:flex;

            align-items:center;

            gap:12px;

            box-shadow:
            0 8px 25px rgba(0,0,0,0.06);

            cursor:pointer;
        }

        .profile-box .badge{

            background:#22c55e;
        }

        /* CONTENT */
        .content-card{

            background:
            rgba(255,255,255,0.45);

            backdrop-filter:blur(20px);

            border-radius:30px;

            padding:35px;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.05);
        }

        /* TITLE */
        .content-card h1,
        .content-card h2,
        .content-card h3,
        .content-card h4{

            color:#0f172a !important;

            font-weight:bold;
        }

        .content-card p{
            color:#475569;
        }

        /* CARD */
        .card{

            border:none !important;

            border-radius:25px;

            background:white !important;

            box-shadow:
            0 10px 30px rgba(0,0,0,0.06);

            transition:0.3s;
        }

        .card:hover{

            transform:translateY(-5px);
        }

        /* CHART */
        .chart-box{

            background:white;

            border-radius:28px;

            padding:30px;

            color:#0f172a;

            box-shadow:
            0 10px 30px rgba(0,0,0,0.06);
        }

        .chart-box h3,
        .chart-box p{

            color:#0f172a !important;
        }

        /* TABLE */
        .table-wrapper{

            background:white;

            border-radius:25px;

            padding:20px;

            box-shadow:
            0 8px 25px rgba(0,0,0,0.05);
        }

        .table{

            margin-bottom:0;

            border-collapse:separate;

            border-spacing:0;
        }

        .table thead{

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #16a34a
            );

            color:white;
        }

        .table thead th{

            border:none !important;

            padding:18px;

            background:transparent !important;

            color:white !important;
        }

        .table tbody tr{

            background:white !important;

            transition:0.2s;
        }

        .table tbody td{

            padding:18px;

            vertical-align:middle;

            color:#0f172a !important;

            background:white !important;

            border-color:#dbeafe !important;
        }

        /* HOVER FIX */
        .table tbody tr:hover td{

            background:#dcfce7 !important;

            color:#0f172a !important;
        }

        /* BUTTON */
        .btn-primary{

            border:none;

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #16a34a
            );
        }

        .btn-danger{
            border:none;
        }

        /* BADGE */
        .badge{

            padding:10px 14px;

            border-radius:10px;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-thumb{

            background:#94a3b8;

            border-radius:20px;
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">

            <i class="bi bi-car-front-fill"></i>
            Smart Parking

        </div>

        <div class="menu-title">
            MENU ADMIN
        </div>

        <div class="menu">

            <a href="/admin"
               class="{{ request()->is('admin') ? 'active' : '' }}">

                <i class="bi bi-grid-fill"></i>
                Dashboard

            </a>

            <a href="/admin/users"
               class="{{ request()->is('admin/users') ? 'active' : '' }}">

                <i class="bi bi-people-fill"></i>
                Kelola User

            </a>

            <a href="/admin/kendaraan"
               class="{{ request()->is('admin/kendaraan') ? 'active' : '' }}">

                <i class="bi bi-car-front-fill"></i>
                Kendaraan

            </a>

            <a href="/admin/histori"
               class="{{ request()->is('admin/histori') ? 'active' : '' }}">

                <i class="bi bi-clock-history"></i>
                Histori

            </a>

            <a href="/admin/laporan"
               class="{{ request()->is('admin/laporan') ? 'active' : '' }}">

                <i class="bi bi-file-earmark-text-fill"></i>
                Laporan

            </a>

            <hr class="text-secondary">

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button class="btn btn-danger w-100">

                    <i class="bi bi-box-arrow-right"></i>
                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">

            <div>

                <h3 class="fw-bold">
                    Admin Panel
                </h3>

                <small class="text-secondary">
                    Smart Parking Universitas Banten Jaya
                </small>

            </div>

            <div class="dropdown">

                <div class="profile-box"
                     data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle fs-4"></i>

                    <div>

                        <div class="fw-bold">
                            {{ auth()->user()->nama }}
                        </div>

                        <span class="badge">
                            admin
                        </span>

                    </div>

                </div>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

<a class="dropdown-item"
  href="/admin/profile">

    <i class="bi bi-person"></i>
    Profile

</a>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button class="dropdown-item">

                                <i class="bi bi-box-arrow-right"></i>
                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="content-card">

            @yield('content')

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>