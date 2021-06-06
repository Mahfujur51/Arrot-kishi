<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = ['product_id','updated_date','purchase_rate','sales_rate'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
  
}
