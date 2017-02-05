<?php

namespace App\Models;

class PaymentGateway
{

    /**
     * @return array
     */
    public function sampleData()
    {
        //Database sample data
        $data = array(
          'Paypal' => array('name' => 'Paypal', 'short' => 'Paypal', 'currency' => 'EUR', 'currencyRate' => 1.08, 'status' => 1),
          'Payu' => array('name' => 'PayU', 'short' => 'Payu', 'currency' => 'TRY', 'currencyRate' => 1.12, 'status' => 1),
          'Paytrek' => array('name' => 'Paytrek', 'short' => 'Paytrek', 'currency' => 'USD', 'currencyRate' => 1.10, 'status' => 1),  
        );
        
        return $data;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function findByNamePaymentGateway($name)
    {
        $data = $this->sampleData();
        
        return isset($data[$name]) ? $data[$name] : null;
    }

    /**
     * @param $column
     * @param $value
     * @return array
     */
    public function findWherePaymentGateway($column, $value)
    {
        $results = array();
        
        foreach ($this->sampleData() as $gateway) {
            if ($gateway[$column] == $value) {
                
                $results[] = $gateway;
            }
        }
        
        return $results;
    }
}