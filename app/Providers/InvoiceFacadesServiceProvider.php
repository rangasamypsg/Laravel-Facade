<?php

namespace App\Providers;

use App\Facades\Invoice;
use Illuminate\Support\ServiceProvider;

class InvoiceFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Invoice', function($app) {
            return new Invoice();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
