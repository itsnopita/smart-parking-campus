@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">

        <h1 class="fw-bold text-white">
            Dashboard Admin
        </h1>

        <p class="text-light opacity-75">
            Smart Parking Universitas Banten Jaya
        </p>

    </div>

    <!-- CARD STATISTIK -->
    <div class="row">

        <!-- TOTAL USER -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg h-100 stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Total User
                            </h6>

                            <h1 class="fw-bold text-primary">
                                {{ $totalUser }}
                            </h1>

                        </div>

                        <div class="icon-box bg-primary">

                            <i class="bi bi-people-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- MAHASISWA -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg h-100 stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Mahasiswa
                            </h6>

                            <h1 class="fw-bold text-success">
                                {{ $totalMahasiswa }}
                            </h1>

                        </div>

                        <div class="icon-box bg-success">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PETUGAS -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg h-100 stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Petugas
                            </h6>

                            <h1 class="fw-bold text-warning">
                                {{ $totalPetugas }}
                            </h1>

                        </div>

                        <div class="icon-box bg-warning">

                            <i class="bi bi-person-badge-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- KENDARAAN AKTIF -->
        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-lg h-100 stat-card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">
                                Kendaraan Aktif
                            </h6>

                            <h1 class="fw-bold text-danger">
                                {{ $kendaraanAktif }}
                            </h1>

                        </div>

                        <div class="icon-box bg-danger">

                            <i class="bi bi-car-front-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<!-- GRAFIK STATISTIK -->
<div class="card border-0 shadow-lg p-4 glass-card mb-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold text-dark mb-1">
                Statistik Smart Parking
            </h3>

            <p class="text-secondary mb-0">
                Aktivitas kendaraan 30 hari terakhir
            </p>

        </div>

        <div class="badge bg-primary px-3 py-2 fs-6">
            Real Time
        </div>

    </div>

    <div style="height:400px;">

        <canvas id="parkirChart"></canvas>

    </div>

</div>


<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('parkirChart');

const gradient = ctx.getContext('2d')
.createLinearGradient(0, 0, 0, 400);

gradient.addColorStop(
    0,
    'rgba(13,110,253,0.45)'
);

gradient.addColorStop(
    1,
    'rgba(25,135,84,0.02)'
);

new Chart(ctx, {

    type: 'line',

    data: {

        labels: @json($chartLabels),

        datasets: [{

            label: 'Kendaraan Masuk',

            data: @json($chartData),

            borderColor: '#0d6efd',

            backgroundColor: gradient,

            fill: true,

            tension: 0.45,

            borderWidth: 4,

            pointRadius: 5,

            pointHoverRadius: 8,

            pointBackgroundColor: '#198754',

            pointBorderColor: '#ffffff',

            pointBorderWidth: 2

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        interaction: {

            intersect: false,
            mode: 'index'

        },

        plugins: {

            legend: {

                labels: {

                    color: '#334155',
                    font: {

                        size: 14

                    }

                }

            }

        },

        scales: {

            x: {

                ticks: {

                    color: '#334155'

                },

                grid: {

                    color: 'rgba(148,163,184,0.2)'

                }

            },

            y: {

                beginAtZero: true,

                ticks: {

                    color: '#334155'

                },

                grid: {

                    color: 'rgba(148,163,184,0.2)'

                }

            }

        }

    }

});

</script>



<div class="badge bg-primary fs-6 px-3 py-2 mb-3">
                Live Data

            </div>

        </div>

        <div class="table-responsive">

        
<table class="table align-middle custom-table">
                <thead>

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th>
                            Kategori
                        </th>

                        <th width="200">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>
                            Total User Sistem
                        </td>

                        <td>

                            <span class="badge bg-primary px-3 py-2">

                                {{ $totalUser }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>
                            Total Mahasiswa
                        </td>

                        <td>

                            <span class="badge bg-success px-3 py-2">

                                {{ $totalMahasiswa }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>3</td>

                        <td>
                            Total Petugas
                        </td>

                        <td>

                            <span class="badge bg-warning text-dark px-3 py-2">

                                {{ $totalPetugas }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>4</td>

                        <td>
                            Kendaraan Sedang Parkir
                        </td>

                        <td>

                            <span class="badge bg-danger px-3 py-2">

                                {{ $kendaraanAktif }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td>5</td>

                        <td>
                            Total Kendaraan Terdaftar
                        </td>

                        <td>

                            <span class="badge bg-info px-3 py-2">

                                {{ $totalKendaraan }}

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>

    .stat-card{

        border-radius:20px;

        transition:0.3s;

        background:white;
    }

    .stat-card:hover{

        transform:translateY(-5px);
    }

    .icon-box{

        width:60px;
        height:60px;

        border-radius:18px;

        display:flex;
        justify-content:center;
        align-items:center;

        color:white;

        font-size:24px;
    }

    .glass-card{

    border-radius:25px;

    background:white;

    backdrop-filter:blur(10px);

    border:1px solid #dbeafe;
}

.custom-table{

    background:white;

    border-radius:20px;

    overflow:hidden;
}

.custom-table thead{

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #16a34a
    );
}

.custom-table thead th{

    color:white !important;

    background:transparent !important;

    border:none !important;

    padding:18px;
}

.custom-table tbody tr{

    background:white !important;

    transition:0.2s;
}

.custom-table tbody td{

    background:white !important;

    color:#0f172a !important;

    padding:18px;

    border-color:#dbeafe !important;
}

.custom-table tbody tr:hover{

    background:#dcfce7 !important;
}

.custom-table tbody tr:hover td{

    background:#dcfce7 !important;

    color:#0f172a !important;
}

</style>

@endsection

