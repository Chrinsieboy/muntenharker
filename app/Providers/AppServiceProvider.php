<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Charts $charts)
    {
        // register chartisan charts
        $charts->register([
            \App\Charts\IncomeChart::class,
            \App\Charts\ExpenseChart::class,
            \App\Charts\TotalChart::class
        ]);
    }
}
