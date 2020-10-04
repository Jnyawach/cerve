<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Career extends Model implements HasMedia
{
    //
    use HasMediaTrait;
    protected $fillable=[
        'user_id',
        'job_id',
        'letter'
    ];

    public  function job(){
        return $this->belongsTo('App\Job');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}
