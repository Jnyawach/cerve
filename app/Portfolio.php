<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Portfolio extends Model implements HasMedia
{
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
        'slug',

    ];


    public  function category(){
        return $this->belongsTo('App\Category');
    }

    public  function registerMediaCollections()
    {
        $this->addMediaCollection('portfolio_photos')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('portfolio_card')
                    ->width(300)
                    ->height(300);

            });


    }
}
