<?php

namespace App\Repositories\PaymentGateway;

use Mail;

class PayuRepository extends AbstractPaymentGatewayRepository implements PaymentGatewayInterface
{
    /**
     * @param $currency
     * @param $price
     * @return mixed
     */
    public function checkCurrency($currency, $price)
    {
        return ($this->getCurrency() === $currency) ? $price : ($price * $this->getCurrencyRate());
    }

    /**
     * @param $price
     * @return bool
     */
    public function pay($price)
    {
        return ($price > 0) ? true : false; //success
    }

    /**
     * @param $data
     */
    public function sendVoucher($data)
    {
        Mail::send('emails.payment', $data, function($mail) use($data)
        {
            $mail->to('accounting@testtest.com')->subject('Payment successful');
        });
    }
}