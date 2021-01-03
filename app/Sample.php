<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Sample extends Model implements HasMedia
{
    //
    use HasMediaTrait;

    protected $fillable=[
        'product_category_id',
        'title',
        'brand',

    ];

    public  function registerMediaCollections()
    {
        $this->addMediaCollection('sample_image')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('sample_card')
                    ->width(200)
                    ->height(200);

            });


    }

    public  function category(){
        return $this->belongsTo('App\ProductCategory');
    }
}
