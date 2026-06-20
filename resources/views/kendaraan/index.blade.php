@extends('layouts.app')

@section('content')

<div class="row">

    <!-- FORM TAMBAH -->
    <div class="col-md-4">

        <div class="card card-custom p-4">

            <h3 class="mb-4">
                <i class="bi bi-plus-circle-fill text-primary"></i>
                Tambah Kendaraan
            </h3>

            <form action="/kendaraan" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Plat Nomor</label>

                    <input type="text"
                        name="plat_nomor"
                        class="form-control"
                        placeholder="Contoh: B 1234 UBJ">
                </div>

                <div class="mb-3">

                    <label>Jenis Kendaraan</label>

                    <select name="jenis" class="form-select">
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                    </select>

                </div>

                <div class="mb-3">

                    <label>Merk</label>

                    <input type="text"
                        name="merk"
                        class="form-control"
                        placeholder="Honda">

                </div>

                <div class="mb-3">

                    <label>Warna</label>

                    <input type="text"
                        name="warna"
                        class="form-control"
                        placeholder="Hitam">

                </div>

                <button class="btn btn-custom w-100">

                    <i class="bi bi-save"></i>
                    Tambah Kendaraan

                </button>

            </form>

        </div>

    </div>

    <!-- LIST KENDARAAN -->
    <div class="col-md-8">

        <div class="card card-custom p-4">

            <h3 class="mb-4">

                <i class="bi bi-car-front-fill text-success"></i>
                Kendaraan Saya

            </h3>

            <div class="row">

                @foreach($kendaraan as $k)

                <div class="col-md-6 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body">

                            <h4 class="fw-bold text-primary mb-3">
                                {{ $k->plat_nomor }}
                            </h4>

                            <p class="mb-1">
                                <strong>Jenis:</strong>
                                {{ $k->jenis }}
                            </p>

                            <p class="mb-1">
                                <strong>Merk:</strong>
                                {{ $k->merk }}
                            </p>

                            <p class="mb-3">
                                <strong>Warna:</strong>
                                {{ $k->warna }}
                            </p>

                            <!-- QR -->
                            <div class="text-center mb-3">

                                @if($k->qr_code)

                                    {!! QrCode::size(120)->generate($k->qr_code) !!}

                                @endif

                            </div>

                            <!-- BUTTON -->
                            <div class="d-grid gap-2">

                                <!-- EDIT -->
                                <a href="/kendaraan/{{ $k->id }}/edit"
                                class="btn btn-warning">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <!-- HAPUS -->
                                <form action="/kendaraan/{{ $k->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger w-100">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                                <!-- FULL QR -->
                                <button type="button"
                                        class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#qrModal{{ $k->id }}">

                                    <i class="bi bi-qr-code-scan"></i>
                                    Full QR

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- MODAL QR -->
                <div class="modal fade"
                    id="qrModal{{ $k->id }}"
                    tabindex="-1">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title">
                                    QR Kendaraan
                                </h5>

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal">
                                </button>

                            </div>

                            <div class="modal-body text-center">

                                <h4 class="mb-3 text-primary">
                                    {{ $k->plat_nomor }}
                                </h4>

                                @if($k->qr_code)

                                    {!! QrCode::size(300)->generate($k->qr_code) !!}

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection

