<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $fillable=[
        'user_id',
        'career_id',
        'resume_id',
        'letter'
    ];

    public  function career(){
        return $this->belongsTo('App\Job');
    }

    public function resume(){
        return $this->belongsTo('App\Document');
    }
}
