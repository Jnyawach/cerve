<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=[
      '  user_id',
        'product_id',
        'quantity',
        'is_active',
        'cancelled',
        'completed',
        'total_price',
        'price',
        'brand_price',
        'small',
        'large',
        'medium',
        'extra_large',
        'printing',
        'description',
        'artwork_id'

    ];
    public  function product(){
        return $this->belongsTo('App\Product');
    }
    public  function user(){
        return $this->belongsTo('App\User');
    }

    public  function artwork(){
        return $this->belongsTo('App\Document');
    }

    public  function  printing(){
        return $this->belongsTo('App\ProductPrinting');
    }
}
