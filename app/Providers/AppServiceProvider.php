<?php

namespace App\Providers;

use App\Http\Controllers\PesanmasukController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Metodepembayaran;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function metod()
    {
        View::composer('*', function ($view) {
            $metod = Metodepembayaran::all();
            $view->with('metod', $metod);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share latest messages with all views
        View::composer('*', function ($view) {
            $pesanmasukController = new PesanmasukController();
            $latestMessages = $pesanmasukController->getLatestMessages();
            $view->with('latestMessages', $latestMessages);
        });
    }
}
