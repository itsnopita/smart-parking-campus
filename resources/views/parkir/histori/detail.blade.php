@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h1 class="fw-bold mb-1"
                style="font-size:46px;color:#111827;">

                Detail Histori

            </h1>

            <p class="text-secondary fs-5 mb-0">

                Informasi lengkap kendaraan parkir.

            </p>

        </div>

        <a href="/histori"
           class="btn btn-dark px-4 py-3 rounded-4">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>



    <!-- CARD -->
    <div class="bg-white rounded-5 shadow-sm p-5">

        <div class="row align-items-center">

            <!-- ICON -->
            <div class="col-lg-4 text-center mb-4 mb-lg-0">

                @if($parkir->tipe_user == 'member')

                    <div class="icon-detail bg-primary-subtle text-primary">

                        <i class="bi bi-person-badge-fill"></i>

                    </div>

                @else

                    <div class="icon-detail bg-success-subtle text-success">

                        <i class="bi bi-person-fill"></i>

                    </div>

                @endif

            </div>

            <!-- DATA -->
            <div class="col-lg-8">

                <div class="row g-4">

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Plat Nomor</small>

                            <h4>

                                {{ $parkir->plat_nomor }}

                            </h4>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Tipe User</small>

                            <h4>

                                {{ strtoupper($parkir->tipe_user) }}

                            </h4>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Waktu Masuk</small>

                            <h5>

                                {{ $parkir->waktu_masuk }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Waktu Keluar</small>

                            <h5>

                                {{ $parkir->waktu_keluar ?? '-' }}

                            </h5>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Status</small>

                            <h4>

                                {{ strtoupper($parkir->status) }}

                            </h4>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <small>Biaya</small>

                            <h4 class="text-success fw-bold">

                                Rp {{ number_format($parkir->biaya) }}

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<style>

.icon-detail{

    width:180px;
    height:180px;

    margin:auto;

    border-radius:40px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:80px;
}

.info-card{

    background:#f8fafc;

    border-radius:24px;

    padding:25px;
}

.info-card small{

    color:#6b7280;

    display:block;

    margin-bottom:8px;
}

.info-card h4,
.info-card h5{

    margin:0;

    font-weight:700;

    color:#111827;
}

</style>

@endsection