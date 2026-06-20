@extends('layouts.admin')

@section('content')

<h1 class="fw-bold mb-4">
    Data Kendaraan
</h1>
<form method="GET" class="mb-4">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari plat nomor..."
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
                <th>Pemilik</th>
                <th>Plat Nomor</th>
                <th>Jenis</th>
            </tr>

        </thead>

        <tbody>

            @foreach($kendaraan as $k)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $k->user->nama ?? '-' }}</td>

                <td>{{ $k->plat_nomor }}</td>

                <td>{{ $k->jenis }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection