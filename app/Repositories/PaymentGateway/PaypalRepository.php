<?php

namespace App\Repositories\PaymentGateway;

use App\Repositories\PaymentGateway\PaymentGatewayInterface as PaymentGatewayInterface;
use App\Models\Payment;

class PaypalRepository implements PaymentGatewayInterface
{
    public $payment;

    function __construct(Payment $payment)
    {
	    $this->payment = $payment;
    }

    public function checkCurrency()
    {
        return "checkCurrency paypal";
    }

    public function pay($id)
    {
        return "pay " . $id;
    }

    public function sendVoucher($id)
    {
        return "sendVoucher " . $id;
    }
}