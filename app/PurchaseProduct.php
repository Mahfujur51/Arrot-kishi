<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
