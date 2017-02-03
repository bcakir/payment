<?php

namespace App\Models;

class Payment
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
   
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAll()
    {
        return static::all();
    }

    public function findPayment($id)
    {
        return static::find($id);
    }

    public function deletePayment($id)
    {
        return static::find($id)->delete();
    }
}