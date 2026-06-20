@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h1 class="fw-bold mb-1"
                style="font-size:48px;color:#111827;">

                Histori Parkir

            </h1>

            <p class="text-secondary fs-5 mb-0">

                Monitoring kendaraan masuk dan keluar realtime.

            </p>

        </div>

        <a href="/petugas"
           class="btn btn-dark px-4 py-3 rounded-4">

            <i class="bi bi-arrow-left"></i>
            Dashboard

        </a>

    </div>



    <!-- CARD STATISTIK -->
    <div class="row g-4 mb-4">

        <!-- AKTIF -->
        <div class="col-lg-4">

            <div class="card-stat">

                <div>

                    <p class="card-title-mini">

                        Kendaraan Aktif

                    </p>

                    <h1 class="text-warning fw-bold">

                        {{ $kendaraanAktif }}

                    </h1>

                </div>

                <div class="icon-stat bg-warning-subtle text-warning">

                    <i class="bi bi-car-front-fill"></i>

                </div>

            </div>

        </div>

        <!-- TOTAL -->
        <div class="col-lg-4">

            <div class="card-stat">

                <div>

                    <p class="card-title-mini">

                        Total Histori

                    </p>

                    <h1 class="text-primary fw-bold">

                        {{ $totalHistori }}

                    </h1>

                </div>

                <div class="icon-stat bg-primary-subtle text-primary">

                    <i class="bi bi-clock-history"></i>

                </div>

            </div>

        </div>

        <!-- PENDAPATAN -->
        <div class="col-lg-4">

            <div class="card-stat">

                <div>

                    <p class="card-title-mini">

                        Total Pendapatan

                    </p>

                    <h1 class="text-success fw-bold">

                        Rp {{ number_format($totalPendapatan,0,',','.') }}

                    </h1>

                </div>

                <div class="icon-stat bg-success-subtle text-success">

                    <i class="bi bi-cash-stack"></i>

                </div>

            </div>

        </div>

    </div>



    <!-- TABLE -->
    <div class="bg-white p-4 rounded-5 shadow-sm">

        <!-- TOP -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>

                <h3 class="fw-bold mb-1">

                    Data Histori

                </h3>

                <p class="text-secondary mb-0">

                    Seluruh aktivitas parkir kendaraan

                </p>

            </div>

            <!-- SEARCH -->
            <div class="search-box">

                <i class="bi bi-search"></i>

                <input type="text"
                       id="searchInput"
                       placeholder="Cari plat / status / tipe">

            </div>

        </div>



        <div class="table-responsive">

            <table class="table align-middle modern-table">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tipe</th>
                        <th>Plat Nomor</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Status</th>
                        <th>Biaya</th>
                        <th width="190">Aksi</th>

                    </tr>

                </thead>

                <tbody id="tableHistori">

                    @foreach($histori as $p)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <!-- TIPE -->
                        <td>

                            @if($p->tipe_user == 'member')

                                <span class="badge-member">

                                    MEMBER

                                </span>

                            @else

                                <span class="badge-tamu">

                                    TAMU

                                </span>

                            @endif

                        </td>

                        <!-- PLAT -->
                        <td class="fw-semibold">

                            {{ $p->plat_nomor ?? 'MEMBER' }}

                        </td>

                        <!-- MASUK -->
                        <td>

                            {{ $p->waktu_masuk }}

                        </td>

                        <!-- KELUAR -->
                        <td>

                            {{ $p->waktu_keluar ?? '-' }}

                        </td>

                        <!-- STATUS -->
                        <td>

                            @if($p->status == 'parkir')

                                <span class="badge-status-warning">

                                    PARKIR

                                </span>

                            @else

                                <span class="badge-status-danger">

                                    KELUAR

                                </span>

                            @endif

                        </td>

                        <!-- BIAYA -->
                        <td class="fw-bold text-success">

                            Rp {{ number_format($p->biaya) }}

                        </td>

                        <!-- AKSI -->
                        <td>

                            <div class="d-flex gap-2">

                                <!-- DETAIL -->
                                <a href="/histori/{{ $p->id }}"
                                   class="btn-detail">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                <!-- HAPUS -->
                                <form action="/histori/{{ $p->id }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Yakin hapus histori ini?')">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



<style>

.card-stat{

    background:white;

    border-radius:30px;

    padding:30px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.card-title-mini{

    color:#6b7280;

    font-size:18px;

    margin-bottom:10px;
}

.icon-stat{

    width:80px;
    height:80px;

    border-radius:25px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:34px;
}

.search-box{

    background:#f3f4f6;

    padding:14px 18px;

    border-radius:18px;

    display:flex;
    align-items:center;
    gap:10px;

    width:320px;
}

.search-box input{

    border:none;

    background:none;

    outline:none;

    width:100%;
}

.modern-table thead tr{

    background:#111827;

    color:white;
}

.modern-table th{

    padding:18px;
}

.modern-table td{

    padding:18px;
}

.modern-table tbody tr{

    border-bottom:1px solid #edf2f7;
}

.badge-member{

    background:#dbeafe;

    color:#2563eb;

    padding:8px 14px;

    border-radius:12px;

    font-size:13px;

    font-weight:600;
}

.badge-tamu{

    background:#dcfce7;

    color:#16a34a;

    padding:8px 14px;

    border-radius:12px;

    font-size:13px;

    font-weight:600;
}

.badge-status-warning{

    background:#fef3c7;

    color:#d97706;

    padding:8px 14px;

    border-radius:12px;

    font-size:13px;

    font-weight:600;
}

.badge-status-danger{

    background:#fee2e2;

    color:#dc2626;

    padding:8px 14px;

    border-radius:12px;

    font-size:13px;

    font-weight:600;
}

.btn-detail{

    width:42px;
    height:42px;

    border-radius:14px;

    background:#2563eb;

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;
}

.btn-delete{

    width:42px;
    height:42px;

    border:none;

    border-radius:14px;

    background:#ef4444;

    color:white;
}

</style>



<script>

document.getElementById('searchInput')
.addEventListener('keyup', function() {

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll(
        '#tableHistori tr'
    );

    rows.forEach(function(row) {

        let text = row.innerText.toLowerCase();

        if (text.includes(value)) {

            row.style.display = '';

        } else {

            row.style.display = 'none';

        }

    });

});

</script>

@endsection