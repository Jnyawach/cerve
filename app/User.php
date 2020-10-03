<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'cellphone',
        'country',
        'town',
        'street',
        'is_active',
       'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public  function role(){
        return $this->belongsTo('App\Role');
    }
    public function isAdmin(){
        if ($this->role->name=='Administrator' && $this->is_active==1){
            return true;
        }
        return false;
    }
    public function posts(){
        return $this->hasMany('App\Blog');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function reviews(){
        return$this->hasMany('App\Review');
    }

    public function prints(){
        return$this->hasMany('App\PrintOnDemand');
    }

    public function career(){
        return$this->hasMany('App\Career');
    }
}
