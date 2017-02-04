<?php

namespace App\Repositories\PaymentGateway;

interface PaymentGatewayInterface {
    
    public function setCurrency($currency);
    
    public function getCurrency($currency);
    
    public function setCurrencyRate($currencyRate);
    
    public function getCurrencyRate($currencyRate);

    public function checkCurrency($currency, $price);

    public function pay($price);

    public function sendVoucher($data);
    
    public function checkout($paymentData);
}