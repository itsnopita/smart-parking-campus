<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Parkir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // =========================
    // DASHBOARD ADMIN
    // =========================
    public function index()
    {
        // TOTAL USER
        $totalUser = User::count();

        // TOTAL MAHASISWA
        $totalMahasiswa = User::where(
            'role',
            'mahasiswa'
        )->count();

        // TOTAL PETUGAS
        $totalPetugas = User::where(
            'role',
            'petugas'
        )->count();

        // TOTAL KENDARAAN
        $totalKendaraan = Kendaraan::count();

        // KENDARAAN SEDANG PARKIR
        $kendaraanAktif = Parkir::where(
            'status',
            'parkir'
        )->count();

        // HISTORI TERBARU
        $historiTerbaru = Parkir::latest()
            ->take(5)
            ->get();

        // =========================
        // GRAFIK 30 HARI
        // =========================

        $chartLabels = [];
        $chartData = [];

        for ($i = 29; $i >= 0; $i--) {

            $tanggal = Carbon::now()->subDays($i);

            $jumlah = Parkir::whereDate(
                'waktu_masuk',
                $tanggal->toDateString()
            )->count();

            $chartLabels[] = $tanggal->format('d M');

            $chartData[] = $jumlah;
        }

        // RETURN VIEW
        return view(
            'admin.dashboard',
            compact(
                'totalUser',
                'totalMahasiswa',
                'totalPetugas',
                'totalKendaraan',
                'kendaraanAktif',
                'historiTerbaru',
                'chartLabels',
                'chartData'
            )
        );
    }

    // =========================
    // KELOLA USER
    // =========================
public function users()
{
    $search = request('search');

    $users = User::where('nama', 'like', "%$search%")
        ->orWhere('email', 'like', "%$search%")
        ->orderByRaw("
            CASE
                WHEN role = 'admin' THEN 1
                WHEN role = 'petugas' THEN 2
                ELSE 3
            END
        ")
        ->paginate(10);

    return view(
        'admin.users',
        compact('users', 'search')
    );
}

public function kendaraan()
{
    $search = request('search');

    $kendaraan = Kendaraan::where(
            'plat_nomor',
            'like',
            "%$search%"
        )
        ->orWhere(
            'jenis',
            'like',
            "%$search%"
        )
        ->latest()
        ->get();

    return view(
        'admin.kendaraan',
        compact('kendaraan', 'search')
    );
}

public function histori()
{
    $search = request('search');

    $histori = Parkir::where(
            'plat_nomor',
            'like',
            "%$search%"
        )
        ->orWhere(
            'status',
            'like',
            "%$search%"
        )
        ->latest()
        ->get();

    return view(
        'admin.histori',
        compact('histori', 'search')
    );
}

public function laporan()
{
    $laporan = Parkir::where('tipe_user', 'tamu')
        ->where('status', 'keluar')
        ->latest()
        ->get();

    $totalMotor = $laporan->where('biaya', 2000)->count();

    $totalMobil = $laporan->where('biaya', 5000)->count();

    $totalPendapatan = $laporan->sum('biaya');

    return view(
        'admin.laporan',
        compact(
            'laporan',
            'totalMotor',
            'totalMobil',
            'totalPendapatan'
        )
    );
}
public function uploadFoto(Request $request)
{
    $request->validate([
        'foto' => 'required|image'
    ]);

    $file = $request->file('foto');

    $namaFile = time().'.'.$file->getClientOriginalExtension();

    $file->move(
        public_path('foto-admin'),
        $namaFile
    );

    $user = User::find(Auth::id());

    $user->foto = $namaFile;

    $user->save();

    return back();
}

public function profile()
{
    return view('admin.profile');
}

}

