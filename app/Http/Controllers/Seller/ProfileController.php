<?php

namespace App\Http\Controllers\Seller;


use App\Http\Controllers\Controller;
use App\User;
use App\Seller;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public  function  index(){
         $user=User::findOrFail(Auth::user()->id);
         $seller=Seller::where('user_id',Auth::user()->id)->first();
         return view('seller.profile.profile',compact('user','seller'));

     }

    public  function  edit(){
         $user = User::find(Auth::user()->id);
         $seller=Seller::where('user_id',Auth::user()->id)->first();
         return view('seller.profile.edit',compact('user','seller'));
     }

    public  function  update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|max:255',
            'role' => 'sometimes|nullable|required|string',
            'status_id' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'seller_address'=>'required|string|max:255',
            'seller_website'=>'required|string|max:255',
            'seller_nid'=>'required|numeric|digits_between:10,20',
            'password' => 'sometimes|nullable|string|confirmed|min:8',
            'sr_name' => 'sometimes|nullable|string|max:255',
            'sr_email' => 'sometimes|nullable|string|max:255',
            'sr_phone' => 'sometimes|nullable|string|max:255',
            'sr_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $user=User::findOrFail($id);
        $image='image_seller/user/'.$user->image;


        if ($request->has('image')){
            if(file_exists(public_path($image))){
                unlink($image);
            }
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('image_seller/user/'.$name_gen);
            $img_url=$name_gen;
        }

        $user -> name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'seller';
        if ($request->has('image')){
            $user->image=$img_url;
        }
        if(!empty($request->password)){
            $user->password=bcrypt($request->password);
        }
        $user->update();
        $seller=Seller::where('user_id',$id)->first();
        $sr_image='image_seller/user/'.$seller->sr_image;

        if ($request->has('sr_image')){
            if(file_exists(public_path($sr_image))){
                unlink($sr_image);
            }
            $sr_image=$request->file('sr_image');
            $name_gen=hexdec(uniqid()).'.'.$sr_image->getClientOriginalExtension();
            Image::make($sr_image)->resize(250,250)->save('image_seller/user/'.$name_gen);
            $img_url4=$name_gen;

        }

        $seller->seller_name = $request->name;
        $seller->seller_address=$request->seller_address;
        $seller->seller_website=$request->seller_website;
        $seller->seller_telephone=$request->phone;
        $seller->seller_email=$request->email;
        $seller->seller_nid=$request->seller_nid;
        $seller->user_id=$user->id;
        if ($request->has('sr_image')){
            $seller->sr_image=$img_url4;
        }

        $seller->sr_name=$request->sr_name;
        $seller->sr_phone=$request->sr_phone;
        $seller->sr_email=$request->sr_email;
        $seller->update();
        Session::flash('info','Seller updated successfully!!');
        return redirect()->route('seller.profile.index');

    }



}
