<?php

namespace App\Repositories\PaymentGateway;

use App\Models\PaymentGateway;

abstract class AbstractPaymentGatewayRepository
{
    public $gateway;
    private $currency;
    private $currencyRate;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @param $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param $currencyRate
     */
    public function setCurrencyRate($currencyRate)
    {
        if ($currencyRate < 1) { //Prevent exchange rate loss
            throw new \Exception(sprintf("Exchange rate cannot be lower than 1.00, %s given.", $currencyRate));
        }

        $this->currencyRate = $currencyRate;
    }

    /**
     * @return mixed
     */
    public function getCurrencyRate()
    {
        return $this->currencyRate;
    }

    /**
     * @param $data
     * @return bool|mixed
     */
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