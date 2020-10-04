<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;


class Blog extends Model implements HasMedia
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
         'is_active',
         'user_id',
         'body',
         'summary',


     ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public  function registerMediaCollections()
    {
        $this->addMediaCollection('blog_photo')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('blog_card')
                    ->width(400)
                    ->height(400);

            });
    }
}
