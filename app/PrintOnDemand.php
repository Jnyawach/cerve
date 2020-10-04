<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintOnDemand extends Model
{
    //
    protected $fillable=['brand_id', 'title','description','artwork_id','status'];

    public function brand(){
        return$this->belongsTo('App\Branding');
    }

    public function user (){
        return $this->belongsTo('App\User');
    }

}
