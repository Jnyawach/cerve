<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable=['order_id','shipping','amount','type'];
}
