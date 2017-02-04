<?php

namespace App\Repositories\PaymentGateway;

use App\Repositories\PaymentGateway\PaymentGatewayInterface as PaymentGatewayInterface;
use App\Models\PaymentGateway;
use Mail;

class PayuRepository implements PaymentGatewayInterface
{
    public $gateway;
    private $currency;
    private $currencyRate;

    function __construct(PaymentGateway $gateway)
    {
	    $this->gateway = $gateway;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency($currency)
    {
        return $this->currency;
    }

    public function setCurrencyRate($currencyRate)
    {
        if ($currencyRate < 1) { //Prevent exchange rate loss
            throw new \RatioException(sprintf("Exchange rate cannot be lower than 1.00, %s given.", $currencyRate));
        }
        
        $this->currencyRate = $currencyRate;
    }

    public function getCurrencyRate($currencyRate)
    {
        return $this->currencyRate;
    }

    public function checkCurrency($currency, $price)
    {
        return ($this->currency === $currency) ? $price : ($price * $this->currencyRate);
    }

    public function pay($price)
    {
        return ($price > 0) ? true : false; //success
    }

    public function sendVoucher($data)
    {
        Mail::send('emails.payment', $data, function($mail) use($data)
        {
            $mail->to('accounting@testtest.com')->subject('Payment successful');
        });
    }
    
    public function checkout($data)
    {
        $gateway = $this->gateway->findByNamePaymentGateway($data['paymentGateway']);
        if ($gateway) {
            
            if ($gateway['status'] == '1') {
                    
                $this->setCurrency($gateway['currency']);
                $this->setCurrencyRate($gateway['currencyRate']);
                
                $price = $this->checkCurrency($data['currency'], $data['price']);
                if ($this->pay($price)) {
                    
                    $data['value'] = $price;
                    $data['currentDateTime'] = date('Y-m-d H:i:s');
                    $this->sendVoucher($data);
                
                    return $price;
                }
            }
        }
        
        return false;
    }
}