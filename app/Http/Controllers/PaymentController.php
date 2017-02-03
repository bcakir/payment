<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Repositories\Payment\PaymentInterface as PaymentInterface;

class PaymentController extends Controller
{
    
    public function __construct(PaymentInterface $payment)
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
        $payments = $this->payment->getAll();
        
        return $payments;
        
        return view('users.index',['users']);
    }

    
}