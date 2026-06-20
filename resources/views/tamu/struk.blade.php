<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Struk Parkir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family:'Poppins',sans-serif;
        }

        body{

            background:#eef4ff;

            padding:40px;
        }

        .struk{

            max-width:450px;

            margin:auto;

            background:white;

            border-radius:35px;

            padding:35px;

            box-shadow:
            0 15px 40px rgba(0,0,0,0.08);
        }

        .logo{

            width:90px;
            height:90px;

            margin:auto;

            border-radius:25px;

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

            font-size:42px;
        }

        .title{

            text-align:center;

            margin-top:20px;
        }

        .title h2{

            font-weight:700;
        }

        .info{

            background:#f8fafc;

            border-radius:22px;

            padding:20px;

            margin-top:25px;
        }

        .info p{

            margin-bottom:12px;
        }

        .qr-box{

            text-align:center;

            margin-top:30px;
        }

        .btn-print{

            width:100%;

            margin-top:30px;

            border:none;

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #0891b2
            );

            color:white;

            padding:15px;

            border-radius:18px;

            font-weight:600;
        }

        @media print{

            .btn-print{
                display:none;
            }

            body{
                background:white;
            }

        }

    </style>

</head>

<body>

<div class="struk">

    <!-- LOGO -->
    <div class="logo">

        <i class="bi bi-car-front-fill"></i>

    </div>

    <!-- TITLE -->
    <div class="title">

        <h2>Smart Parking</h2>

        <p class="text-secondary">

            Tiket Parkir Tamu

        </p>

    </div>

    <!-- INFO -->
    <div class="info">

        <p>

            <strong>Nama:</strong>
            {{ $tamu->nama }}

        </p>

        <p>

            <strong>Instansi:</strong>
            {{ $tamu->instansi }}

        </p>

        <p>

            <strong>Plat Nomor:</strong>
            {{ $tamu->plat_nomor }}

        </p>

        <p>

            <strong>Jenis:</strong>
            {{ ucfirst($tamu->jenis) }}

        </p>

    </div>

    <!-- QR -->
    <div class="qr-box">

        {!! QrCode::size(230)->generate($tamu->qr_code) !!}

        <p class="mt-3 text-secondary">

            Tunjukkan QR ini saat keluar parkir

        </p>

    </div>

    <!-- BUTTON -->
    <button onclick="window.print()"
            class="btn-print">

        Cetak Struk

    </button>

</div>

</body>
</html>