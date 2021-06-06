<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id','order_id','qty','unite_price','delivered_qty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
