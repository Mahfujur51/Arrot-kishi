<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseProduct::class);
    }

    public function getShowDateAttribute()
    {
        return blank($this->created_at) ? '' : $this->created_at->format('d-M-Y');
    }

    public function getShowIdAttribute()
    {
        return "#".str_repeat(0,4-strlen((String) $this->id)).$this->id;
    }
}
