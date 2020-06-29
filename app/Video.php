<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable=['path'];
    protected  $uploads='/videos/';
    public  function getPathAttribute($video){
        return $this->uploads . $video;
    }
    public function products (){
        return $this->belongsTo('App\Product');

    }
}
