<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrinting extends Model
{
    //
    protected $fillable=[
        'product_id',
        'name',
        'cost_1',
        'cost_2',
        'cost_3',
        'cost_4'];

    public  function product(){
        return $this->belongsTo('App\Product');
    }

    public  function branding(){
        return $this->belongsTo('App\Branding');
    }

}
