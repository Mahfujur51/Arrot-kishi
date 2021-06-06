<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerPropose extends Model
{
    protected $fillable = ['product_id','seller_id','price','status','quantity','total'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'seller_id','id');
    }

   
}
