<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background: #f4f8fb;
        }

        /* NAVBAR */
        .navbar-custom{
            background: linear-gradient(90deg, #0d6efd, #198754);
            padding: 15px 0;
        }

        /* CARD */
        .card-custom{
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* BUTTON */
        .btn-custom{
            background: linear-gradient(90deg, #0d6efd, #198754);
            border: none;
            color: white;
        }

        .btn-custom:hover{
            opacity: 0.9;
            color: white;
        }

    </style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold"
        href="/dashboard">

            <i class="bi bi-car-front-fill"></i>
            Smart Parking

        </a>

        <!-- MENU KANAN -->
        <div class="ms-auto d-flex align-items-center gap-3">

            <!-- NAMA USER -->
            <span class="text-white fw-semibold">

                {{ auth()->user()->nama }}

            </span>

            <!-- ROLE -->
            <span class="badge bg-light text-dark">

                {{ auth()->user()->role }}

            </span>

            <!-- BUTTON LOGOUT -->
            <form method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="btn btn-light btn-sm">

                    <i class="bi bi-box-arrow-right"></i>
                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<div class="container mt-4">

    @yield('content')

</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

