@extends('layouts.petugas')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h1 class="fw-bold mb-1"
                style="font-size:48px;color:#111827;">

                Scanner Parkir

            </h1>

            <p class="text-secondary fs-5 mb-0">

                Scan QR kendaraan masuk dan keluar realtime.

            </p>

        </div>

        <a href="/petugas"
           class="btn btn-dark px-4 py-3 rounded-4">

            <i class="bi bi-arrow-left"></i>
            Dashboard

        </a>

    </div>



    <!-- SCANNER CARD -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-7">

            <div class="scanner-card">

                <!-- ICON -->
                <div class="scanner-icon">

                    <i class="bi bi-qr-code-scan"></i>

                </div>

                <!-- TITLE -->
                <h2 class="fw-bold text-center mb-2">

                    Scan QR Parkir

                </h2>

                <p class="text-secondary text-center mb-4">

                    Sistem scan otomatis kendaraan kampus

                </p>

                <!-- JAM -->
                <div class="jam-box mb-4">

                    <h1 id="jam"
                        class="jam-text">
                    </h1>

                    <p class="mb-0 text-secondary">

                        Waktu realtime parkir

                    </p>

                </div>



                <!-- ALERT SUCCESS -->
                @if(session('success'))

                    <div class="alert-modern success-alert mb-4">

                        <i class="bi bi-check-circle-fill"></i>

                        {{ session('success') }}

                    </div>

                @endif



                <!-- ALERT ERROR -->
                @if(session('error'))

                    <div class="alert-modern error-alert mb-4">

                        <i class="bi bi-x-circle-fill"></i>

                        {{ session('error') }}

                    </div>

                @endif



                <!-- FORM -->
                <form action="/scan-parkir"
                      method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label fw-semibold mb-3">

                            Input QR Kendaraan

                        </label>

                        <div class="input-modern">

                            <i class="bi bi-upc-scan"></i>

                            <input type="text"
                                   name="qr_code"
                                   placeholder="Contoh: QR-B1234UBJ"
                                   autofocus>

                        </div>

                    </div>



                    <!-- BUTTON -->
                    <button type="submit"
                            class="btn-scan w-100">

                        <i class="bi bi-qr-code-scan"></i>

                        Scan Sekarang

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>



<style>

.scanner-card{

    background:white;

    border-radius:40px;

    padding:50px;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.06);
}

.scanner-icon{

    width:120px;
    height:120px;

    margin:auto;
    margin-bottom:25px;

    border-radius:35px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #059669
    );

    display:flex;
    align-items:center;
    justify-content:center;

    color:white;

    font-size:60px;
}

.jam-box{

    text-align:center;

    background:#f8fafc;

    padding:30px;

    border-radius:30px;
}

.jam-text{

    font-size:58px;

    font-weight:700;

    color:#2563eb;

    margin-bottom:8px;
}

.alert-modern{

    padding:18px 20px;

    border-radius:20px;

    font-weight:500;

    display:flex;
    align-items:center;
    gap:12px;
}

.success-alert{

    background:#dcfce7;

    color:#166534;
}

.error-alert{

    background:#fee2e2;

    color:#991b1b;
}

.input-modern{

    background:#f8fafc;

    border:2px solid #e5e7eb;

    border-radius:22px;

    padding:18px 22px;

    display:flex;
    align-items:center;
    gap:14px;

    transition:0.3s;
}

.input-modern:focus-within{

    border-color:#2563eb;

    box-shadow:
        0 0 0 4px rgba(37,99,235,0.1);
}

.input-modern i{

    font-size:24px;

    color:#2563eb;
}

.input-modern input{

    border:none;

    outline:none;

    background:none;

    width:100%;

    font-size:18px;
}

.btn-scan{

    border:none;

    padding:18px;

    border-radius:22px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #059669
    );

    color:white;

    font-size:20px;

    font-weight:600;

    transition:0.3s;
}

.btn-scan:hover{

    transform:translateY(-2px);

    opacity:0.95;
}

@media(max-width:768px){

    .scanner-card{

        padding:30px 24px;
    }

    .jam-text{

        font-size:40px;
    }

    .scanner-icon{

        width:90px;
        height:90px;

        font-size:45px;
    }

}

</style>



<script>

function updateJam() {

    let sekarang = new Date();

    let jam = sekarang.getHours()
        .toString()
        .padStart(2, '0');

    let menit = sekarang.getMinutes()
        .toString()
        .padStart(2, '0');

    let detik = sekarang.getSeconds()
        .toString()
        .padStart(2, '0');

    document.getElementById('jam')
        .innerHTML =
        jam + ':' + menit + ':' + detik;
}

setInterval(updateJam, 1000);

updateJam();

</script>

@endsection