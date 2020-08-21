<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable=['path'];
    protected  $uploads='/documents/';
    public  function getPathAttribute($artwork){
        return $this->uploads . $artwork;
    }

    public function product(){
        return $this->hasMany('App\Order');
    }
}
