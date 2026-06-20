<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use Illuminate\Support\Str;

class TamuController extends Controller
{
    public function index()
    {
        $tamu = Tamu::latest()->get();

        return view('tamu.index', compact('tamu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'instansi' => 'required',
            'plat_nomor' => 'required',
            'jenis' => 'required',
        ]);

        Tamu::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'instansi' => $request->instansi,
            'plat_nomor' => $request->plat_nomor,
            'jenis' => $request->jenis,
            'qr_code' => Str::uuid(),
        ]);

        return back()->with(
            'success',
            'Data tamu berhasil ditambahkan'
        );
    }
public function struk(int $id)
{
    $tamu = Tamu::findOrFail($id);

    return view(
        'tamu.struk',
        compact('tamu')
    );
}
}