<?php

namespace App\Http\Controllers\Buyer;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Notifications\OrderBill;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Image;

class BillingController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $order = Order::findOrFail($request->order_id);
        $data = $request->validate([
            'order_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'buyer_id' => 'sometimes|nullable',
            'bill_amount' => 'required',
            'payment_amount' => 'required',
            // 'due_date' => 'required',
            'check_issue_date' => 'required',
            'check_number' => 'required',
            'bank_name' => 'required',
            'payment_type' => 'required',
            'check_photo' => 'required|mimes:jpeg,jpg,png|required|max:10000'
        ]);
            
        if($request->has('check_photo')){
            $image = $request->file('check_photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('images/check/'.$name_gen);
            $data['check_photo'] = $name_gen;
        }

        $bill = Billing::create($data);
        $billings = Billing::where('order_id',$order->id)->get();
        $paid_amount = $billings->sum('payment_amount');
        $total = 0;
        foreach($order->items as $item){
            $total += ($item->delivered_qty * $item->unite_price);
        }
        if($paid_amount == $total){
            $order->payment_status = 'paid';
            $order->save();
        }
        elseif($paid_amount < $total){
            $order->payment_status = 'partials';
            $order->save();
        }
        //send notification
        $users = User::where('role','supplier')->get();
        Notification::send($users, new OrderBill($order,$bill));

        Session::flash('success','Order payment has been submitted!');
        return back();
    }
}
