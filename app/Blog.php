<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Blog extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'  => true
            ]
        ];
    }

    //
     protected $fillable=[
         'title',
         'is_active',
         'user_id',
         'photo_id',
         'body',
         'summary',


     ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
