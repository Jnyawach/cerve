<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branding extends Model
{
    //
    protected $fillable=[
        'name',
        'cost_1',
        'cost_2',
        'cost_3',
        'cost_4'
    ];

    public function products(){
        return $this->belongsTo('App\Products');
    }

    public  function brandings(){
        return $this->belongsToMany('App\Product');
    }
}
