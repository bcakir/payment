<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return $id;
        //return view('user.profile', ['user' => $id]);
    }

}