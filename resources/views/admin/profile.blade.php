@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg p-5 text-center">

                @if(auth()->user()->foto)

                    <img src="{{ asset('foto-admin/'.auth()->user()->foto) }}"
                         class="rounded-circle mx-auto mb-4"
                         width="170"
                         height="170"
                         style="object-fit:cover; border:6px solid #dbeafe;">

                @else

                    <i class="bi bi-person-circle"
                       style="font-size:170px;"></i>

                @endif

                <h1 class="fw-bold mb-1">
                    {{ auth()->user()->nama }}
                </h1>

                <p class="text-secondary fs-5">
                    {{ auth()->user()->email }}
                </p>

                <hr class="my-4">

                <div class="row text-start">

                    <div class="col-md-6 mb-4">

                        <h3 class="fw-bold">
                            Shift Kerja
                        </h3>

                        <h2 class="text-success">
                            Pagi
                        </h2>

                    </div>

                    <div class="col-md-6 mb-4">

                        <h3 class="fw-bold">
                            Jam Real Time
                        </h3>

                        <h2 id="jam"
                            class="text-primary fw-bold">
                        </h2>

                    </div>

                </div>

                <hr class="my-4">

                <form method="POST"
                      action="/admin/upload-foto"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <input type="file"
                               name="foto"
                               class="form-control">

                    </div>

                    <button class="btn btn-primary px-5">

                        Upload Foto

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

function updateJam(){

    let sekarang = new Date();

    let jam =
    sekarang.toLocaleTimeString(
        'id-ID'
    );

    document.getElementById(
        'jam'
    ).innerHTML = jam;
}

setInterval(updateJam,1000);

updateJam();

</script>

@endsection