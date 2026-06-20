<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Parkir;
use App\Models\Tamu;

class ParkirController extends Controller
{
    public function index()
    {
        return view('parkir.index');
    }

public function histori()
{
    $parkir = Parkir::latest()->get();

    return view(
        'parkir.histori.index',
        compact('parkir')
    );
}

    public function scan(Request $request)
    {
        $request->validate([
            'qr_code' => 'required'
        ]);

        // =========================
        // CEK MEMBER
        // =========================
        $kendaraan = Kendaraan::where(
            'qr_code',
            $request->qr_code
        )->first();

    
// =========================
// JIKA MEMBER DITEMUKAN
// =========================
if ($kendaraan) {

    $parkirAktif = Parkir::where(
        'kendaraan_id',
        $kendaraan->id
    )
    ->where('status', 'parkir')
    ->first();

    // =========================
    // MASUK
    // =========================
    if (!$parkirAktif) {

        Parkir::create([

            'user_id' => $kendaraan->user_id,

            'kendaraan_id' => $kendaraan->id,

            'plat_nomor' => $kendaraan->plat_nomor,

            'tipe_user' => 'member',

            'waktu_masuk' => now(),

            'status' => 'parkir',

            'biaya' => 0

        ]);

        return back()->with(
            'success',
            'Member masuk parkir'
        );
    }

    // =========================
    // KELUAR
    // =========================
    $parkirAktif->update([

        'waktu_keluar' => now(),

        'status' => 'keluar',

        'biaya' => 0

    ]);

    return back()->with(
        'success',
        'Member keluar parkir'
    );
}


        // =========================
        // CEK TAMU
        // =========================
        $tamu = Tamu::where(
            'qr_code',
            $request->qr_code
        )->first();

        // =========================
        // JIKA TAMU DITEMUKAN
        // =========================
        if ($tamu) {

            $parkirAktif = Parkir::where(
                'plat_nomor',
                $tamu->plat_nomor
            )
            ->where('status', 'parkir')
            ->first();

            // MASUK
            if (!$parkirAktif) {

                Parkir::create([
                    'plat_nomor' => $tamu->plat_nomor,
                    'tipe_user' => 'tamu',
                    'waktu_masuk' => now(),
                    'status' => 'parkir',
                    'biaya' => 0
                ]);

                return back()->with(
                    'success',
                    'Tamu masuk parkir'
                );
            }

            // KELUAR
            $biaya = $tamu->jenis === 'mobil' ? 5000 : 2000;
            $parkirAktif->update([
            'waktu_keluar' => now(),
            'status' => 'keluar',
            'biaya' => $biaya
            ]);

            return back()->with(
            'success',
            'Tamu keluar parkir - bayar Rp ' . number_format($biaya, 0, ',', '.')
);
        }

        // =========================
        // TIDAK DITEMUKAN
        // =========================
        return back()->with(
            'error',
            'QR tidak ditemukan'
        );
    }
}