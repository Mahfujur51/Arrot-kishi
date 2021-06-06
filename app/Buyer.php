<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'buyer_id', 'buyer_name', 'buyer_address','buyer_website','buyer_telephone','buyer_email','buyer_nid','br_name','br_email','br_phone','br_image','buyer_type','trade_license','expire_date','buyer_logo','tagline','user_id',
    ];
}
