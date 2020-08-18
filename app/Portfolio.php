<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Portfolio extends Model
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
        'client' ,
        'is_active',
        'category_id',
        'description',
        'video_id',
        'slug',
        'path'
    ];

    public function video(){
        return $this->belongsTo('App\Video');
    }
    public function photos(){
        return $this->hasMany('App\PortfolioPhoto');
    }

    public  function category(){
        return $this->belongsTo('App\Category');
    }
}
