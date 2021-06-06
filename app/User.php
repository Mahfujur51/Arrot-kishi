<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','buyer_id','seller_id','role','status_id','image','phone','parent_id'
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




    public  function  buyer(){
        return $this->hasOne(Buyer::class,'user_id','id');
    }
    public  function  seller(){
        return $this->hasOne(Seller::class,'user_id','id');
    }
    public  function  parent(){
        return $this->hasOne(User::class,'id','parent_id');
    }
    public function scopeFilter($query,$seller)
    {
        return $query->where('id','like','%'.$seller.'%');
    }

}
