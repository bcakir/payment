<?php

namespace App\Repositories\PaymentGateway;

use App\Repositories\PaymentGateway\PaymentGatewayInterface as PaymentGatewayInterface;
use App\Models\Payment;

class PaytrekRepository implements PaymentGatewayInterface
{
    public $payment;

    function __construct(Payment $payment)
    {
	    $this->payment = $payment;
    }

    public function checkCurrency()
    {
        return "checkCurrency paytrek";
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