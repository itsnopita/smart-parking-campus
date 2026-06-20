<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| REDIRECT DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/dashboard', function () {

    $user = Auth::user();

    if ($user->role == 'admin') {
        return redirect('/admin');
    }

    if ($user->role == 'petugas') {
        return redirect('/petugas');
    }

    if ($user->role == 'mahasiswa') {
        return redirect('/member');
    }

});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // DASHBOARD
    Route::get(
        '/admin',
        [AdminController::class, 'index']
    );

    // USERS
    Route::get(
        '/admin/users',
        [AdminController::class, 'users']
    );

    // KENDARAAN
    Route::get(
        '/admin/kendaraan',
        [AdminController::class, 'kendaraan']
    );

    // HISTORI
    Route::get(
        '/admin/histori',
        [AdminController::class, 'histori']
    );

    // LAPORAN
    Route::get(
        '/admin/laporan',
        [AdminController::class, 'laporan']
    );

    // PROFILE
    Route::get(
        '/admin/profile',
        [AdminController::class, 'profile']
    );

    // UPLOAD FOTO
    Route::post(
        '/admin/upload-foto',
        [AdminController::class, 'uploadFoto']
    );

});


/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:petugas'])->group(function () {

    // DASHBOARD
    Route::get('/petugas', function () {
        return view('petugas.dashboard');
    });

    // PARKIR
    Route::get(
        '/parkir',
        [ParkirController::class, 'index']
    );

    Route::post(
        '/scan-parkir',
        [ParkirController::class, 'scan']
    );

    // TAMU
    Route::get(
        '/tamu',
        [TamuController::class, 'index']
    );

    Route::post(
        '/tamu',
        [TamuController::class, 'store']
    );

    Route::get(
        '/tamu/{id}/struk',
        [TamuController::class, 'struk']
    );

    // HISTORI
    Route::get(
        '/histori',
        [HistoriController::class, 'index']
    );

    Route::get(
        '/histori/{id}',
        [HistoriController::class, 'show']
    );

    Route::delete(
        '/histori/{id}',
        [HistoriController::class, 'destroy']
    );

});


/*
|--------------------------------------------------------------------------
| MEMBER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    // DASHBOARD MEMBER
    Route::get(
        '/member',
        [MemberController::class, 'dashboard']
    );

    // TAMBAH KENDARAAN
    Route::post(
        '/kendaraan',
        [MemberController::class, 'storeKendaraan']
    );

    // EDIT KENDARAAN
    Route::get(
        '/kendaraan/{id}/edit',
        [MemberController::class, 'editKendaraan']
    );

    // UPDATE KENDARAAN
    Route::put(
        '/kendaraan/{id}',
        [MemberController::class, 'updateKendaraan']
    );

    // HAPUS KENDARAAN
    Route::delete(
        '/kendaraan/{id}',
        [MemberController::class, 'hapusKendaraan']
    );

});


require __DIR__.'/auth.php';