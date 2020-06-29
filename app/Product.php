<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Product extends Model
{
    //
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
                'source' => 'name',
                'onUpdate'  => true
            ]
        ];
    }
    //
    protected $fillable=[
        'is_active',
        'category_id',
        'name',
        'color',
        'size',
        'weight',
        'description',
        'features',
        'price',
        'stock',
        'brand',
        'video_id'
    ];
    public  function category(){
        return $this->belongsTo('App\ProductCategory');
    }
    public function photos(){
        return$this->hasMany('App\ProductPhotos');
    }
    public function video(){
        return$this->belongsTo('App\Video');
    }
}
