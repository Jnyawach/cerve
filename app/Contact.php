<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
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
                'source' => 'subject',
                'onUpdate'  => false
            ]
        ];
    }
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'subject',
        'body',
        'read',
        'response'
    ];
}
