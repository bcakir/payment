<?php

namespace App\Repositories\PaymentGateway;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class PaymentGatewayRepoServiceProvider extends ServiceProvider
{
    
    protected $availableServices = ['PaypalRepository', 'PaytrekRepository'];
    
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
        $selected = studly_case($request->get('user_selection'));
        $service = (in_array($selected, $this->availableServices)) ? $selected : 'PaytrekRepository';
        $this->app->bind('App\Repositories\PaymentGateway\PaymentGatewayInterface', "App\Repositories\PaymentGateway\\{$service}");
    }
    
}