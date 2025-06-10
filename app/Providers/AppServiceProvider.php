<?php

namespace App\Providers;

use App\Models\StatistikPenduduk;
use ConsoleTVs\Charts\ChartsServiceProvider;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $websiteName = StatistikPenduduk::first()->nama_desa ?? ''; // Sesuaikan dengan model dan kolom yang sesuai
        View::share('websiteName', $websiteName);
    }
}
