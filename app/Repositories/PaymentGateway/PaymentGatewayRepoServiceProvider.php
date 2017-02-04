<?php

namespace App\Repositories\PaymentGateway;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class PaymentGatewayRepoServiceProvider extends ServiceProvider
{
    
    protected $availableServices = ['Paypal', 'Payu', 'Paytrek'];
    
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
        $this->app->call([$this, 'registerService']);
    }
    
    public function registerService(Request $request)
    {
        $selected = studly_case($request->get('paymentGateway', 'Paypal'));
        $service = (in_array($selected, $this->availableServices)) ? $selected : 'Paypal';
        $this->app->bind('App\Repositories\PaymentGateway\PaymentGatewayInterface', "App\Repositories\PaymentGateway\\{$service}Repository");
    }
    
}