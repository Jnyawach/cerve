<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class Product extends Model implements HasMedia
{
    //
    use Sluggable;
    use SluggableScopeHelpers;
    use HasMediaTrait;

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
   public  function costs(){
        return$this->hasMany('App\ProductPrinting');
    }

    public  function registerMediaCollections()
    {
        $this->addMediaCollection('product_photos')

        ->registerMediaConversions(function (Media $media){
            $this->addMediaConversion('product_card')
                ->width(300)
                ->height(300);

        });

        $this->addMediaCollection('branded_sample')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('brand_card')
                    ->width(400)
                    ->height(400);

            });
    }


}
