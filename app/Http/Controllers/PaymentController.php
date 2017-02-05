<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use App\Repositories\PaymentGateway\PaymentGatewayInterface;

class PaymentController extends Controller
{
    
    public function __construct(PaymentGatewayInterface $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @param PaymentGateway $gateway
     * @return mixed
     */
    public function index(PaymentGateway $gateway)
    {
        $gateways = $gateway->findWherePaymentGateway('status', 1);
        
        return view('payment.checkout', ['gateways' => $gateways]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function checkout(Request $request)
    {
        $paymentData = array(
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'currency' => $request->get('currency'),
            'paymentGateway' => $request->get('paymentGateway')
        );
        
        $price = $this->payment->checkout($paymentData);
        if ($price) {
            
            return view('payment.success', ['price' => $price]);
        }
        
        return view('payment.error');
    }
    
}