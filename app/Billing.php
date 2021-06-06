<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [ 'order_id','user_id','buyer_id','bill_amount','payment_amount','due_date','check_issue_date','check_number','bank_name','payment_type','check_photo'];

    public function getCreateDateAttribue()
    {
        return blank($this->created_at) ? '' : $this->created_at->format('d-m-Y');
    }
    public  function  getUser(){
        return $this->belongsTo(User::class,'user_id',id);
    }
}
