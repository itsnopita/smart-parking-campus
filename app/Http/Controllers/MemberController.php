<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Kendaraan;
use App\Models\Parkir;

class MemberController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD MEMBER
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $user = Auth::user();

        // TOTAL KENDARAAN
        $totalKendaraan = Kendaraan::where(
            'user_id',
            $user->id
        )->count();

        // TOTAL PARKIR
        $totalParkir = 0;

        // DATA KENDARAAN
        $kendaraan = Kendaraan::where(
            'user_id',
            $user->id
        )->latest()->get();

        // HISTORI
        $histori = Parkir::where(
    'user_id',
    $user->id
)->latest()->take(5)->get();

        return view(
            'member.dashboard',
            compact(
                'totalKendaraan',
                'totalParkir',
                'kendaraan',
                'histori'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | TAMBAH KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function storeKendaraan(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis' => 'required',
            'merk' => 'required',
            'warna' => 'required',
        ]);

        Kendaraan::create([
            'user_id' => Auth::user()->id,
            'plat_nomor' => $request->plat_nomor,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'warna' => $request->warna,
            'status' => 'aktif',
            'qr_code' => Str::uuid(),
        ]);

        return redirect('/member');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function editKendaraan(int $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view(
            'kendaraan.edit',
            compact('kendaraan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function updateKendaraan(Request $request, int $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->update([
            'plat_nomor' => $request->plat_nomor,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'warna' => $request->warna,
        ]);

        return redirect('/member');
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function hapusKendaraan(int $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $kendaraan->delete();

        return redirect('/member');
    }

}