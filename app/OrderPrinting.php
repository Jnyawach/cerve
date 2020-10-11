<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class OrderPrinting extends Model  implements HasMedia
{
    //
    use HasMediaTrait;

    protected $fillable=[
        'user_id',
        'product_id',
        'product_printing_id',
        'description'

    ];

    public function productPrinting(){
        return $this->belongsTo('App\ProductPrinting');
    }

    public  function order(){
        return $this->belongsTo('App\Order');
    }
}
