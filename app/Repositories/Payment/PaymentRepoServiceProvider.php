<?php

namespace App\Repositories\Payment;

use Illuminate\Support\ServiceProvider;

class PaymentRepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Payment\PaymentInterface', 'App\Repositories\Payment\PaymentRepository');
    }
}