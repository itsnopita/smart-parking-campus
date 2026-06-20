@extends('layouts.admin')

@section('content')

<h1 class="fw-bold mb-4">
    Laporan Keuangan Tamu
</h1>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="stat-card">
            <h5>Total Motor</h5>
            <h2>{{ $totalMotor }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h5>Total Mobil</h5>
            <h2>{{ $totalMobil }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h5>Total Pendapatan</h5>
            <h2>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h2>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header">
        Riwayat Pembayaran Tamu
    </div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Plat Nomor</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Biaya</th>
                </tr>
            </thead>

            <tbody>

                @forelse($laporan as $item)

                <tr>
                    <td>{{ $item->plat_nomor }}</td>

                    <td>
                        {{ $item->waktu_masuk?->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        {{ $item->waktu_keluar?->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        Rp {{ number_format($item->biaya, 0, ',', '.') }}
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection