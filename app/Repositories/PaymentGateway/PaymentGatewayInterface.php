<?php

namespace App\Repositories\PaymentGateway;

interface PaymentGatewayInterface {

    public function checkCurrency();

    public function pay($id);

    public function sendVoucher($id);
}