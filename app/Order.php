<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    //


    protected $fillable=[
        'user_id',
        'mpesa_c2b_id',
        'cart_data',
        'is_active',
        'amount'
    ];


    public  function product(){
        return $this->belongsTo('App\Product');
    }
    public  function user(){
        return $this->belongsTo('App\User');
    }

    public  function  payment(){
        return $this->belongsTo('App\MpesaC2B');
    }
}
