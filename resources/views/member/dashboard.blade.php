@extends('layouts.member')

@section('content')

<!-- =========================
     DASHBOARD
========================= -->

<section id="dashboard">

<div class="mb-10">

    <h1 class="text-5xl font-extrabold text-gray-800">

        Dashboard Mahasiswa

    </h1>

    <p class="text-gray-500 mt-3 text-lg">

        Kelola kendaraan dan histori parkir Anda.

    </p>

</div>

<!-- CARD INFO -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- TOTAL KENDARAAN -->
    <div class="bg-white p-7 rounded-3xl shadow-lg border border-gray-100">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-gray-500 text-lg font-medium">

                    Total Kendaraan

                </h2>

                <p class="text-5xl font-extrabold text-green-600 mt-4">

                    {{ $totalKendaraan }}

                </p>

            </div>

            <div class="text-6xl">
                🚗
            </div>

        </div>

    </div>

    <!-- TOTAL PARKIR -->
    <div class="bg-white p-7 rounded-3xl shadow-lg border border-gray-100">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-gray-500 text-lg font-medium">

                    Total Parkir

                </h2>

                <p class="text-5xl font-extrabold text-blue-600 mt-4">

                    {{ $totalParkir }}

                </p>

            </div>

            <div class="text-6xl">
                🅿️
            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div class="bg-white p-7 rounded-3xl shadow-lg border border-gray-100">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-gray-500 text-lg font-medium">

                    Status Member

                </h2>

                <p class="text-3xl font-extrabold text-purple-600 mt-4">

                    Aktif

                </p>

            </div>

            <div class="text-6xl">
                ✅
            </div>

        </div>

    </div>

</div>

</section>

<!-- =========================
     KENDARAAN
========================= -->

<section id="kendaraan" class="mt-24 scroll-mt-28">

<div class="flex justify-between items-center mb-8">

    <h2 class="text-4xl font-bold text-gray-800">

        Kendaraan Saya

    </h2>

</div>

<!-- FORM -->
<div class="bg-white p-8 rounded-3xl shadow-lg mb-10 border border-gray-100">

    <h3 class="text-2xl font-bold mb-6 text-gray-700">

        Tambah Kendaraan

    </h3>

    <form action="/kendaraan" method="POST">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <input
                type="text"
                name="plat_nomor"
                placeholder="Plat Nomor"
                class="border border-gray-200 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >

            <select
                name="jenis"
                class="border border-gray-200 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >

                <option value="">
                    Pilih Jenis Kendaraan
                </option>

                <option value="Motor">
                    Motor
                </option>

                <option value="Mobil">
                    Mobil
                </option>

            </select>

            <input
                type="text"
                name="merk"
                placeholder="Merk Kendaraan"
                class="border border-gray-200 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >

            <input
                type="text"
                name="warna"
                placeholder="Warna Kendaraan"
                class="border border-gray-200 rounded-2xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >

        </div>

        <button
            class="mt-6 bg-gradient-to-r from-green-600 to-blue-600 hover:opacity-90 text-white px-7 py-4 rounded-2xl shadow-lg font-semibold transition">

            Simpan Kendaraan

        </button>

    </form>

</div>

<!-- LIST -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    @forelse($kendaraan as $item)

    <div class="bg-white rounded-3xl shadow-xl p-7 hover:-translate-y-2 transition duration-300 border border-gray-100">

        <!-- ICON -->
        <div class="flex justify-center mb-5">

            @if(strtolower($item->jenis) == 'motor')

                <div class="text-8xl">
                    🏍️
                </div>

            @else

                <div class="text-8xl">
                    🚗
                </div>

            @endif

        </div>

        <!-- PLAT -->
        <h3 class="text-3xl font-extrabold text-center text-slate-700 tracking-wide">

            {{ $item->plat_nomor }}

        </h3>

        <!-- JENIS -->
        <p class="text-center text-gray-500 mt-2 text-lg capitalize">

            {{ $item->jenis }}

        </p>

        <!-- DETAIL -->
        <div class="mt-6 space-y-3">

            <div class="bg-slate-100 p-4 rounded-2xl">

                <span class="text-gray-500">
                    Merk :
                </span>

                <span class="font-bold text-slate-700">
                    {{ $item->merk }}
                </span>

            </div>

            <div class="bg-slate-100 p-4 rounded-2xl">

                <span class="text-gray-500">
                    Warna :
                </span>

                <span class="font-bold text-slate-700">
                    {{ $item->warna }}
                </span>

            </div>

        </div>

        <!-- BUTTON QR -->
        <button
            onclick="openQR('{{ $item->qr_code }}', '{{ $item->plat_nomor }}')"
            class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-semibold transition">

            📱 Scan QR

        </button>

        <!-- HAPUS -->
        <form
            action="/kendaraan/{{ $item->id }}"
            method="POST"
            class="mt-3"
        >

            @csrf
            @method('DELETE')

            <button
                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold transition">

                Hapus Kendaraan

            </button>

        </form>

    </div>

    @empty

    <div class="bg-white rounded-3xl shadow-lg p-12 col-span-3 text-center">

        <div class="text-7xl mb-4">
            🚘
        </div>

        <h3 class="text-2xl font-bold text-gray-700">

            Belum Ada Kendaraan

        </h3>

        <p class="text-gray-500 mt-2">

            Tambahkan kendaraan untuk mulai parkir.

        </p>

    </div>

    @endforelse

</div>

</section>

<!-- =========================
     HISTORI
========================= -->

<section id="histori" class="mt-24 scroll-mt-28">

<div class="mb-8">

    <h2 class="text-4xl font-bold text-gray-800">

        Histori Parkir

    </h2>

</div>

<div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gradient-to-r from-blue-600 to-green-600 text-white">

                <tr>

                    <th class="p-5 text-left">
                        Plat Nomor
                    </th>

                    <th class="p-5 text-left">
                        Waktu Masuk
                    </th>

                    <th class="p-5 text-left">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($histori as $h)

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="p-5 font-semibold text-gray-700">

                        {{ $h->plat_nomor ?? '-' }}

                    </td>

                    <td class="p-5 text-gray-600">

                        {{ $h->waktu_masuk ?? '-' }}

                    </td>

                    <td class="p-5">

                        @if($h->status == 'parkir')

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl font-semibold">

                                PARKIR

                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl font-semibold">

                                KELUAR

                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3" class="p-12 text-center">

                        <div class="flex flex-col items-center justify-center">

                            <div class="text-7xl mb-4">
                                📋
                            </div>

                            <h3 class="text-2xl font-bold text-gray-700 mb-2">

                                Belum Ada Histori Parkir

                            </h3>

                            <p class="text-gray-500">

                                Histori kendaraan masuk dan keluar akan tampil di sini.

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</section>

<!-- =========================
     MODAL QR
========================= -->

<div
    id="qrModal"
    class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 p-5"
>

<div class="bg-white rounded-3xl p-8 w-full max-w-md text-center relative">

    <!-- CLOSE -->
    <button
        onclick="closeQR()"
        class="absolute top-4 right-5 text-4xl text-gray-400 hover:text-red-500"
    >

        &times;

    </button>

    <h2 class="text-3xl font-bold text-slate-700 mb-2">

        QR Kendaraan

    </h2>

    <p
        id="platText"
        class="text-gray-500 mb-5 text-lg"
    >

    </p>

    <!-- QR -->
    <div class="flex justify-center">

        <img
            id="qrImage"
            src=""
            class="w-72 h-72 border rounded-3xl p-4"
        >

    </div>

    <p class="mt-5 text-sm text-gray-400">

        Tunjukkan QR ini ke petugas parkir

    </p>

</div>

</div>

<!-- SCRIPT -->

<script>

    function openQR(qr, plat)
    {
        document.getElementById('qrModal').classList.remove('hidden');
        document.getElementById('qrModal').classList.add('flex');

        document.getElementById('platText').innerHTML = plat;

        document.getElementById('qrImage').src =
            'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' + qr;
    }

    function closeQR()
    {
        document.getElementById('qrModal').classList.add('hidden');
        document.getElementById('qrModal').classList.remove('flex');
    }

</script>

@endsection
