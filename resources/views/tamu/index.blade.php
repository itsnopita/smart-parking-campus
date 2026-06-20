@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h1 class="fw-bold mb-1"
                style="font-size:48px;color:#111827;">

                Kelola Tamu

            </h1>

            <p class="text-secondary fs-5 mb-0">

                Tambahkan data tamu dan generate QR parkir otomatis.

            </p>

        </div>

        <a href="/petugas"
           class="btn btn-dark px-4 py-3 rounded-4">

            <i class="bi bi-arrow-left"></i>
            Dashboard

        </a>

    </div>



    <div class="row g-4">

        <!-- FORM -->
        <div class="col-lg-4">

            <div class="bg-white p-4 rounded-5 shadow-sm border-0 h-100">

                <div class="d-flex align-items-center gap-3 mb-4">

                    <div class="icon-box bg-success-subtle text-success">

                        <i class="bi bi-person-plus-fill"></i>

                    </div>

                    <div>

                        <h3 class="fw-bold mb-0">
                            Tambah Tamu
                        </h3>

                        <small class="text-secondary">
                            Input data kendaraan tamu
                        </small>

                    </div>

                </div>

                @if(session('success'))

                    <div class="alert alert-success rounded-4 border-0">

                        {{ session('success') }}

                    </div>

                @endif

                <form action="/tamu" method="POST">

                    @csrf

                    <!-- NAMA -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nama Tamu
                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control form-modern"
                               placeholder="Masukkan nama tamu"
                               required>

                    </div>

                    <!-- HP -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            No HP
                        </label>

                        <input type="text"
                               name="no_hp"
                               class="form-control form-modern"
                               placeholder="08xxxxxxxxxx"
                               required>

                    </div>

                    <!-- INSTANSI -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Instansi
                        </label>

                        <input type="text"
                               name="instansi"
                               class="form-control form-modern"
                               placeholder="Asal instansi"
                               required>

                    </div>

                    <!-- PLAT -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Plat Nomor
                        </label>

                        <input type="text"
                               name="plat_nomor"
                               class="form-control form-modern"
                               placeholder="B 1234 XYZ"
                               required>

                    </div>

                    <!-- JENIS -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Jenis Kendaraan
                        </label>

                        <select name="jenis"
                                class="form-select form-modern">

                            <option value="motor">
                                Motor
                            </option>

                            <option value="mobil">
                                Mobil
                            </option>

                        </select>

                    </div>

                    <button class="btn btn-success-modern w-100">

                        <i class="bi bi-check-circle-fill"></i>
                        Simpan Data Tamu

                    </button>

                </form>

            </div>

        </div>



        <!-- LIST TAMU -->
        <div class="col-lg-8">

            <div class="bg-white p-4 rounded-5 shadow-sm border-0">

                <div class="d-flex align-items-center gap-3 mb-4">

                    <div class="icon-box bg-primary-subtle text-primary">

                        <i class="bi bi-people-fill"></i>

                    </div>

                    <div>

                        <h3 class="fw-bold mb-0">
                            Data Tamu
                        </h3>

                        <small class="text-secondary">
                            QR parkir tamu realtime
                        </small>

                    </div>

                </div>

                <div class="row g-4">

                    @forelse($tamu as $t)

                    <div class="col-md-6">

                        <div class="card-tamu">

                            <!-- ICON -->
                            <div class="text-center mb-3">

                                @if(strtolower($t->jenis) == 'motor')

                                    <img
                                        src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png"
                                        width="90">

                                @else

                                    <img
                                        src="https://cdn-icons-png.flaticon.com/512/741/741407.png"
                                        width="90">

                                @endif

                            </div>

                            <!-- NAMA -->
                            <h4 class="fw-bold text-center text-primary mb-3">

                                {{ $t->nama }}

                            </h4>

                            <!-- DATA -->
                            <div class="info-box">

                                <div class="mb-2">

                                    <strong>Instansi:</strong>
                                    {{ $t->instansi }}

                                </div>

                                <div class="mb-2">

                                    <strong>Plat:</strong>
                                    {{ $t->plat_nomor }}

                                </div>

                                <div>

                                    <strong>Jenis:</strong>
                                    {{ ucfirst($t->jenis) }}

                                </div>

                            </div>

                            <!-- QR -->
                            <div class="text-center my-4">

                                {!! QrCode::size(180)->generate($t->qr_code) !!}

                            </div>

                            <!-- BUTTON -->
                            <a href="/tamu/{{ $t->id }}/struk"
                               target="_blank"
                               class="btn btn-primary-modern w-100">

                                <i class="bi bi-printer-fill"></i>
                                Cetak Struk

                            </a>

                        </div>

                    </div>

                    @empty

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-inbox text-secondary"
                               style="font-size:70px;"></i>

                            <h4 class="mt-3 text-secondary">

                                Belum Ada Data Tamu

                            </h4>

                        </div>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>



<style>

.form-modern{

    border-radius:18px;
    padding:14px 18px;
    border:1px solid #dbe4f0;
    box-shadow:none;
}

.form-modern:focus{

    border-color:#2563eb;
    box-shadow:none;
}

.icon-box{

    width:65px;
    height:65px;

    border-radius:22px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;
}

.card-tamu{

    background:#ffffff;

    border:1px solid #edf2f7;

    border-radius:30px;

    padding:28px;

    height:100%;

    transition:0.3s;

    box-shadow:0 5px 20px rgba(0,0,0,0.04);
}

.card-tamu:hover{

    transform:translateY(-5px);
}

.info-box{

    background:#f8fafc;

    border-radius:18px;

    padding:18px;
}

.btn-success-modern{

    border:none;

    background:linear-gradient(
        135deg,
        #16a34a,
        #059669
    );

    color:white;

    padding:14px;

    border-radius:18px;

    font-weight:600;
}

.btn-primary-modern{

    display:block;

    text-align:center;

    text-decoration:none;

    background:linear-gradient(
        135deg,
        #2563eb,
        #0891b2
    );

    color:white;

    padding:14px;

    border-radius:18px;

    font-weight:600;
}

.btn-primary-modern:hover{

    color:white;

    opacity:0.95;
}

</style>

@endsection