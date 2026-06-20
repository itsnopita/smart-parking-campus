@extends('layouts.admin')

@section('content')

<h1 class="fw-bold mb-4">
    Histori Parkir
</h1>

<form method="GET" class="mb-4">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari plat/status..."
               value="{{ request('search') }}">

        <button class="btn btn-primary">

            <i class="bi bi-search"></i>
            Search

        </button>

    </div>

</form>

<div class="card border-0 shadow-lg p-4 glass-card">

    <table class="table align-middle custom-table">

        <thead>

            <tr>
                <th>No</th>
                <th>Kendaraan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

@foreach($histori as $h)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $h->plat_nomor }}</td>

    <td>{{ $h->waktu_masuk?->format('d/m/Y H:i:s') }}</td>

    <td>{{ $h->waktu_keluar?->format('d/m/Y H:i:s') }}</td>

    <td>

        @if($h->status == 'parkir')

            <span class="badge bg-success">
                PARKIR
            </span>

        @else

            <span class="badge bg-secondary">
                KELUAR
            </span>

        @endif

    </td>

</tr>

@endforeach

        </tbody>

    </table>

</div>

@endsection