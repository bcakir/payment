<?php

namespace App\Repositories\Payment;

use App\Repositories\Payment\PaymentInterface as PaymentInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentInterface
{
    public $payment;

    function __construct(Payment $payment)
    {
	    $this->payment = $payment;
    }

    public function getAll()
    {
        return "selam";
        return $this->payment->getAll();
    }

    public function find($id)
    {
        return $this->payment->findPayment($id);
    }

    public function delete($id)
    {
        return $this->payment->deletePayment($id);
    }
}