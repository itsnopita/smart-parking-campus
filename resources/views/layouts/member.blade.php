<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Parking</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>

        /* SCROLL HALUS */
        html{
            scroll-behavior: smooth;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar{
            width: 8px;
        }

        ::-webkit-scrollbar-thumb{
            background: #2563eb;
            border-radius: 20px;
        }

        ::-webkit-scrollbar-track{
            background: #e5e7eb;
        }

    </style>

</head>

<body class="bg-gray-100">

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav
        class="fixed top-0 left-0 right-0 z-50
        bg-gradient-to-r from-green-600 to-blue-600
        text-white h-20 shadow-lg">

        <div class="flex justify-between items-center h-full px-8">

            <!-- LOGO -->
            <h1
                class="font-extrabold text-4xl tracking-wide">

                SMART PARKING

            </h1>

            <!-- USER -->
            <div class="text-right">

                <h2 class="font-bold text-2xl">

                    {{ auth()->user()->nama }}

                </h2>

                <p class="text-sm opacity-90">

                    Mahasiswa

                </p>

            </div>

        </div>

    </nav>



    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside
        class="fixed top-20 left-0
        w-64 h-[calc(100vh-80px)]
        bg-blue-700 text-white
        shadow-xl overflow-y-auto">

        <div class="p-6">

            <ul class="space-y-3">

                <!-- DASHBOARD -->
                <li>

                    <a href="/member"

                       class="flex items-center gap-3
                       hover:bg-blue-500
                       p-3 rounded-xl
                       transition-all duration-300
                       hover:translate-x-1">

                        🏠 Dashboard

                    </a>

                </li>


                <!-- KENDARAAN -->
                <li>

                    <a href="/member#kendaraan"

                       class="flex items-center gap-3
                       hover:bg-blue-500
                       p-3 rounded-xl
                       transition-all duration-300
                       hover:translate-x-1">

                        🚗 Kendaraan Saya

                    </a>

                </li>


                <!-- HISTORI -->
                <li>

                    <a href="/member#histori"

                       class="flex items-center gap-3
                       hover:bg-blue-500
                       p-3 rounded-xl
                       transition-all duration-300
                       hover:translate-x-1">

                        📋 Histori Parkir

                    </a>

                </li>


                <!-- LOGOUT -->
                <li>

                    <form action="/logout" method="POST">

                        @csrf

                        <button

                            class="w-full text-left
                            hover:bg-red-500
                            p-3 rounded-xl
                            transition-all duration-300
                            hover:translate-x-1">

                            🚪 Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </aside>



    <!-- =========================
         CONTENT
    ========================== -->

    <main
        class="ml-64 pt-24 p-10 min-h-screen">

        @yield('content')

    </main>

</body>
</html>