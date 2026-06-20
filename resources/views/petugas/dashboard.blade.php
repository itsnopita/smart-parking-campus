@extends('layouts.petugas')

@section('content')

<div class="container-fluid py-4">

    <!-- HEADER -->
    <div class="mb-5">

        <h1 class="fw-bold text-dark display-5 mb-2">
            Dashboard Petugas
        </h1>

        <p class="text-secondary fs-5">
            Kelola parkir, scan QR kendaraan, dan data tamu kampus.
        </p>

    </div>


    <!-- MENU CARD -->
    <div class="row g-4">

        <!-- SCAN PARKIR -->
        <div class="col-lg-4 col-md-6">

            <div class="modern-card scan-card h-100">

                <div class="icon-box bg-primary-subtle text-primary">

                    <i class="bi bi-qr-code-scan"></i>

                </div>

                <h3 class="fw-bold mt-4">
                    Scan Parkir
                </h3>

                <p class="text-muted mb-4">
                    Scan QR kendaraan masuk dan keluar secara realtime.
                </p>

                <a href="/parkir"
                   class="btn btn-gradient-blue w-100">

                    <i class="bi bi-camera"></i>
                    Buka Scanner

                </a>

            </div>

        </div>


        <!-- DATA TAMU -->
        <div class="col-lg-4 col-md-6">

            <div class="modern-card tamu-card h-100">

                <div class="icon-box bg-success-subtle text-success">

                    <i class="bi bi-people-fill"></i>

                </div>

                <h3 class="fw-bold mt-4">
                    Kelola Tamu
                </h3>

                <p class="text-muted mb-4">
                    Tambahkan tamu dan generate QR parkir otomatis.
                </p>

                <a href="/tamu"
                   class="btn btn-gradient-green w-100">

                    <i class="bi bi-person-plus-fill"></i>
                    Kelola Tamu

                </a>

            </div>

        </div>


        <!-- HISTORI -->
        <div class="col-lg-4 col-md-6">

            <div class="modern-card histori-card h-100">

                <div class="icon-box bg-dark-subtle text-dark">

                    <i class="bi bi-clock-history"></i>

                </div>

                <h3 class="fw-bold mt-4">
                    Histori Parkir
                </h3>

                <p class="text-muted mb-4">
                    Lihat seluruh histori kendaraan masuk dan keluar.
                </p>

                <a href="/histori"
                   class="btn btn-dark w-100 rounded-4 py-3 fw-semibold">

                    <i class="bi bi-table"></i>
                    Lihat Histori

                </a>

            </div>

        </div>

    </div>

</div>



<style>

    .modern-card{

        background:white;

        border-radius:28px;

        padding:35px;

        box-shadow:
            0 15px 35px rgba(0,0,0,0.08);

        transition:0.35s;

        border:none;

        position:relative;

        overflow:hidden;
    }

    .modern-card:hover{

        transform:
            translateY(-8px);

        box-shadow:
            0 25px 45px rgba(37,99,235,0.18);
    }

    .icon-box{

        width:95px;
        height:95px;

        border-radius:24px;

        display:flex;
        justify-content:center;
        align-items:center;

        font-size:45px;
    }

    .btn-gradient-blue{

        background:linear-gradient(
            135deg,
            #2563eb,
            #0891b2
        );

        border:none;

        color:white;

        padding:14px;

        border-radius:18px;

        font-weight:600;
    }

    .btn-gradient-green{

        background:linear-gradient(
            135deg,
            #16a34a,
            #059669
        );

        border:none;

        color:white;

        padding:14px;

        border-radius:18px;

        font-weight:600;
    }

    .btn-gradient-blue:hover,
    .btn-gradient-green:hover{

        color:white;

        opacity:0.95;
    }

    @media(max-width:768px){

        .modern-card{

            padding:28px;
        }

    }

</style>

@endsection