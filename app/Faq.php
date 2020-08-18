<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $fillable=['question','category_id','is_active','answer'];
    public function category(){
        return $this->belongsTo('App\FaqCategory');
}
}
