<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\PaymentGateway\PaymentGatewayInterface as PaymentGatewayInterface;

class PaymentGatewayController extends Controller
{
    
    public function __construct(PaymentGatewayInterface $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = $this->payment->checkCurrency();
        
        return $payments;
        
        return view('users.index',['users']);
    }

    
}