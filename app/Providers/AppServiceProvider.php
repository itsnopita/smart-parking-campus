<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Redirect::macro('home', function () {

            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect('/admin');
            }

            if ($role == 'petugas') {
                return redirect('/petugas');
            }

            return redirect('/member');
        });
    }
}