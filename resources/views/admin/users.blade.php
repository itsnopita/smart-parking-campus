@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-4">

        <h1 class="fw-bold text-white">
            Kelola User
        </h1>

        <p class="text-light opacity-75">
            Manajemen akun Smart Parking
        </p>
<form method="GET" class="mb-4">

    <div class="input-group">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari nama atau email..."
               value="{{ request('search') }}">

        <button class="btn btn-primary">

            <i class="bi bi-search"></i>
            Search

        </button>

    </div>

</form>
    </div>

    <!-- CARD -->
    <div class="card border-0 shadow-lg p-4 glass-card">

        <div class="table-responsive">

            <table class="table align-middle custom-table">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

    @foreach($users as $u)

    <tr>

        <td>
            {{ $loop->iteration }}
        </td>

      <td style="color:#0f172a !important; font-weight:600;">
    {{ $u->nama }}
</td>

        <td>
            {{ $u->email }}
        </td>

        <td>

            @if($u->role == 'admin')

                <span class="badge bg-danger">
                    ADMIN
                </span>

            @elseif($u->role == 'petugas')

                <span class="badge bg-warning text-dark">
                    PETUGAS
                </span>

            @else

                <span class="badge bg-success">
                    MAHASISWA
                </span>

            @endif

        </td>

        <td>

            <button class="btn btn-sm btn-primary">

                <i class="bi bi-pencil-square"></i>
                Edit

            </button>

            <button class="btn btn-sm btn-danger">

                <i class="bi bi-trash"></i>
                Hapus

            </button>

        </td>

    </tr>

    @endforeach

</tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $users->links() }}

        </div>

    </div>

</div>

<style>

.custom-table{

    background:white;

    border-radius:20px;

    overflow:hidden;
}

.custom-table thead{

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #16a34a
    );
}

.custom-table thead th{

    color:white !important;

    background:transparent !important;

    border:none !important;

    padding:18px;
}

.custom-table tbody tr{

    background:white !important;

    transition:0.2s;
}

.custom-table tbody td{

    background:white !important;

    color:#0f172a !important;

    padding:18px;

    border-color:#dbeafe !important;
}

.custom-table tbody tr:hover{

    background:#dcfce7 !important;
}

.custom-table tbody tr:hover td{

    background:#dcfce7 !important;

    color:#0f172a !important;
}

</style>

@endsection

