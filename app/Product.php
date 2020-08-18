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
        'price_2',
        'price_3',
        'price_4',
        'stock',
        'S',
        'M',
        'L',
        'XL',
        'brand',
        'video_id',
        'path',
        'photo_id'
    ];
    public  function category(){
        return $this->belongsTo('App\ProductCategory');
    }

    public function video(){
        return$this->belongsTo('App\Video');
    }

    public  function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function wishlist(){
        return$this->hasMany('App\Wishlist');
    }

    public function reviews(){
        return$this->hasMany('App\Review');
    }
public  function lastImage($path){
        $data=json_decode($path, true);
    $keys = array_keys($data);
    return $last_key = array_pop($keys);
}


}
