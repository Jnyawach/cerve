<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Job extends Model
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
                'source' => 'title',
                'onUpdate'  => true
            ]
        ];
    }

    protected $fillable=[
        'title',
        'description',
        'duration',
        'is_active',
        'slug',
        'town',
        'country'
    ];

    public  function careers(){
        return $this->hasMany('App\Career');
    }

}
