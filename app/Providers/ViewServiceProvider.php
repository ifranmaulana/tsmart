<?php

namespace App\Providers;

use App\Models\KeranjangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         View::composer('*', function ($view) {
        $countKeranjang = 0;

        if (Auth::check()) {
            $countKeranjang = KeranjangModel::where('iduser', Auth::id())->count();
        }

        $view->with('keranjangCount', $countKeranjang);
    });
    }
}
