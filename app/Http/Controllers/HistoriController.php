<?php

namespace App\Http\Controllers;

use App\Models\Parkir;

class HistoriController extends Controller
{
    public function index()
    {
        // semua histori
        $histori = Parkir::latest()->get();

        // kendaraan masih parkir
        $kendaraanAktif = Parkir::where(
            'status',
            'parkir'
        )->count();

        // total histori
        $totalHistori = Parkir::count();

        // total pendapatan
        $totalPendapatan = Parkir::sum('biaya');

        return view(
            'parkir.histori.index',
            compact(
                'histori',
                'kendaraanAktif',
                'totalHistori',
                'totalPendapatan'
            )
        );
    }
    public function show(int $id)
{
    $parkir = Parkir::findOrFail($id);

    return view('histori.detail', compact('parkir'));
}

public function destroy(int $id)
{
    $parkir = Parkir::findOrFail($id);

    $parkir->delete();

    return redirect('/histori')
        ->with('success', 'Data histori berhasil dihapus');
}
}