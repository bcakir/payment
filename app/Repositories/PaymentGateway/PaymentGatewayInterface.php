<?php

namespace App\Repositories\PaymentGateway;

interface PaymentGatewayInterface {

    public function checkCurrency($currency, $price);

    public function pay($price);

    public function sendVoucher($data);
}