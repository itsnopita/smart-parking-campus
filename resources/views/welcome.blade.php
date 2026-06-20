<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Smart Parking UNBAJA</title>

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

        html{
            scroll-behavior:smooth;
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

        /* BACKGROUND EFFECT */
        .blur1{

            position:fixed;

            width:350px;
            height:350px;

            background:#3b82f6;

            border-radius:50%;

            filter:blur(120px);

            opacity:0.22;

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

            opacity:0.22;

            bottom:-120px;
            right:-120px;

            z-index:1;
        }

        /* HERO CARD */
        .hero{

            position:relative;

            z-index:10;

            width:100%;
            max-width:580px;

            padding:50px 40px;

            text-align:center;

            background:rgba(255,255,255,0.72);

            border:1px solid rgba(255,255,255,0.8);

            border-radius:32px;

            backdrop-filter:blur(18px);

            box-shadow:
                0 25px 50px rgba(37,99,235,0.14),
                0 10px 25px rgba(0,0,0,0.06);

            color:#1e293b;

            animation:fadeUp 1s ease;
        }

        @keyframes fadeUp{

            from{
                opacity:0;
                transform:translateY(40px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        /* LOGO */
        .logo{

            width:105px;
            height:105px;

            margin:auto;
            margin-bottom:28px;

            border-radius:50%;

            display:flex;
            justify-content:center;
            align-items:center;

            background:linear-gradient(
                135deg,
                #2563eb,
                #22c55e
            );

            font-size:48px;

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
                transform:translateY(-10px);
            }

            100%{
                transform:translateY(0px);
            }
        }

        /* TITLE */
        h1{

            font-size:52px;

            font-weight:700;

            margin-bottom:10px;

            color:#0f172a;
        }

        /* SUBTITLE */
        .kampus{

            font-size:22px;

            font-weight:600;

            color:#16a34a;

            margin-bottom:24px;
        }

        /* DESCRIPTION */
        .desc{

            color:#475569;

            font-size:17px;

            line-height:1.9;

            margin-bottom:40px;
        }

        /* BUTTON GROUP */
        .button-group{

            display:flex;

            justify-content:center;

            gap:18px;

            flex-wrap:wrap;
        }

        /* BUTTON */
        .btn-custom{

            padding:15px 34px;

            border:none;

            border-radius:16px;

            font-size:18px;

            font-weight:600;

            transition:0.35s;

            text-decoration:none;

            display:inline-flex;

            align-items:center;

            justify-content:center;

            gap:10px;

            min-width:190px;
        }

        .btn-login{

            background:linear-gradient(
                135deg,
                #2563eb,
                #16a34a
            );

            color:white;

            box-shadow:
                0 10px 25px rgba(37,99,235,0.20);
        }

        .btn-register{

            background:white;

            border:2px solid #dbeafe;

            color:#2563eb;

            box-shadow:
                0 10px 20px rgba(0,0,0,0.04);
        }

        .btn-custom:hover{

            transform:
                translateY(-4px)
                scale(1.02);

            opacity:0.95;
        }

        /* MOBILE */
        @media(max-width:768px){

            body{

                padding:25px 15px;
            }

            .hero{

                padding:40px 24px;

                border-radius:26px;
            }

            .logo{

                width:90px;
                height:90px;

                font-size:40px;
            }

            h1{

                font-size:40px;
            }

            .kampus{

                font-size:18px;
            }

            .desc{

                font-size:16px;

                line-height:1.8;
            }

            .btn-custom{

                width:100%;

                min-width:100%;
            }

        }

    </style>

</head>

<body>

<!-- BLUR BACKGROUND -->
<div class="blur1"></div>
<div class="blur2"></div>

<!-- HERO -->
<div class="hero">

    <!-- LOGO -->
    <div class="logo">

        <i class="bi bi-car-front-fill"></i>

    </div>

    <!-- TITLE -->
    <h1>

        Smart Parking

    </h1>

    <!-- SUBTITLE -->
    <div class="kampus">

        Universitas Banten Jaya

    </div>

    <!-- DESCRIPTION -->
    <div class="desc">

        Sistem parkir kampus modern berbasis QR Code
        untuk mempermudah monitoring kendaraan
        mahasiswa dan petugas parkir secara realtime
        dengan tampilan modern dan penggunaan yang mudah.

    </div>

    <!-- BUTTON -->
    <div class="button-group">

        <a href="/login"
           class="btn-custom btn-login">

            <i class="bi bi-box-arrow-in-right"></i>

            Login

        </a>

        <a href="/register"
           class="btn-custom btn-register">

            <i class="bi bi-person-plus-fill"></i>

            Register

        </a>

    </div>

</div>

</body>
</html>