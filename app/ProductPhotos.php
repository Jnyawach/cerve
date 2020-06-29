<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhotos extends Model
{
    //
    protected $fillable=['product_id','path'];
    protected  $uploads='/images/';
    public  function getPathAttribute($image){
        return $this->uploads . $image;
    }

    public function products(){
        return $this->belongsTo('App\Product');
    }
}
