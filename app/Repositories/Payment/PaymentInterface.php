<?php

namespace App\Repositories\Payment;

interface PaymentInterface {

    public function getAll();

    public function find($id);

    public function delete($id);
}