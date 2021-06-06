<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class ProfileController extends Controller
{
     public  function  index(){
         $user=User::findOrFail(Auth::user()->id);
         $buyer=Buyer::where('user_id',Auth::user()->id)->first();
         return view('buyer.profile.profile',compact('user','buyer'));

     }
     public  function  edit(){
         $user = User::find(Auth::user()->id);
         $buyer=Buyer::where('user_id',Auth::user()->id)->first();
         return view('buyer.profile.edit',compact('user','buyer'));
     }
    //Buyer Update
    public  function  update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|max:255',
            'role' => 'sometimes|nullable|required|string',
            'status_id' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'buyer_address'=>'required|string|max:255',
            'buyer_website'=>'required|string|max:255',
            'buyer_nid'=>'required|numeric|digits_between:10,20',
            'buyer_type'=>'required|string|max:255',
            'expire_date'=>'sometimes|nullable|string|max:255',
            'trade_license' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'buyer_logo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'tagline' => 'required|string|max:255',
            'password' => 'sometimes|nullable|confirmed|min:8',
            'br_name' => 'sometimes|nullable|string|max:255',
            'br_email' => 'sometimes|nullable|string|max:255',
            'br_phone' => 'sometimes|nullable|string|max:255',
            'br_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $user=User::findOrFail($id);


        $buyer=Buyer::where('user_id',$id)->first();
        $trade_license='image_buyer/user/'.$buyer->trade_license;
        $buyer_logo='image_buyer/user/'.$buyer->buyer_logo;
        $br_image='image_buyer/user/'.$buyer->br_image;

        if ($request->has('trade_license')){
            if(file_exists(public_path($trade_license))){
                unlink($trade_license);
            }
            $trade_license=$request->file('trade_license');
            $name_gen=hexdec(uniqid()).'.'.$trade_license->getClientOriginalExtension();
            Image::make($trade_license)->resize(600,600)->save('image_buyer/user/'.$name_gen);
            $img_url2=$name_gen;


        }
        if ($request->has('buyer_logo')){
            if(file_exists(public_path($buyer_logo))){
                unlink($buyer_logo);
            }
            $buyer_logo=$request->file('buyer_logo');
            $name_gen=hexdec(uniqid()).'.'.$buyer_logo->getClientOriginalExtension();
            Image::make($buyer_logo)->resize(250,250)->save('image_buyer/user/'.$name_gen);
            $img_url3=$name_gen;

        }
        if ($request->has('br_image')){
            if(file_exists(public_path($br_image))){
                unlink($br_image);
            }
            $br_image=$request->file('br_image');
            $name_gen=hexdec(uniqid()).'.'.$buyer_logo->getClientOriginalExtension();
            Image::make($br_image)->resize(250,250)->save('image_buyer/user/'.$name_gen);
            $img_url4=$name_gen;

        }


        $user -> name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'buyer';
        if ($request->has('buyer_logo')){
            $user->image=$img_url3;
        }
        if(!empty($request->password)){
            $user->password=bcrypt($request->password);
        }
        $user->update();



        $buyer->buyer_name = $request->name;
        $buyer->buyer_address=$request->buyer_address;
        $buyer->buyer_website=$request->buyer_website;
        $buyer->buyer_telephone=$request->phone;
        $buyer->buyer_email=$request->email;
        $buyer->buyer_nid=$request->buyer_nid;
        $buyer->buyer_type=$request->buyer_type;
        $buyer->expire_date=$request->expire_date;
        $buyer->tagline=$request->tagline;
        $buyer->user_id=$user->id;
        if ($request->has('trade_license')){
            $buyer->trade_license=$img_url2;
        }
        if ($request->has('buyer_logo')){
            $buyer->buyer_logo=$img_url3;
        }
        if ($request->has('br_image')){
            $buyer->br_image=$img_url4;
        }

        $buyer->br_name=$request->br_name;
        $buyer->br_phone=$request->br_phone;
        $buyer->br_email=$request->br_email;
        $buyer->update();
        Session::flash('success','Profile updated successfully!!');
        return redirect()->route('buyer.profile.index');



    }
    public  function  user_edit(){
         $user=User::findOrFail(Auth::user()->id);

         return view('buyer.profile.userprofile',compact('user'));
    }
    public  function  user_update(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'phone' => 'sometimes|nullable|digits:11',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'sometimes|nullable|confirmed|min:6',

        ]);
        $image='users/'.$user->image;
        if ($request->has('image')){
            if(file_exists(public_path($image))){
                unlink($image);
            }
            $image=$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('users/'.$name_gen);
            $img_url2=$name_gen;


        }
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if (!empty($request->password)){
            $user->password=bcrypt($request->password);

        }
        if ($request->has('image')){
            $user->image=$img_url2;
        }
        $user->update();
        Session::flash('success','Profile Updated successfully!');
        return redirect()->route('buyer.profile.index');

    }


}
