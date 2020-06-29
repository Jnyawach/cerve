<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
    //
    protected $fillable=['portfolio_id','path'];
    protected  $uploads='/images/';
    public  function getPathAttribute($image){
        return $this->uploads . $image;
    }

    public function portfolio(){
        return $this->belongsTo('App\Portfolio');
    }
}
