<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seller_id', 'seller_name', 'seller_address','seller_website','seller_telephone','seller_email','seller_nid','sr_name','sr_email','sr_phone','sr_image','user_id',
    ];
}
