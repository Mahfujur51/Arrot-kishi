<?php

namespace App\Http\Controllers\Supplier;

use App\Seller;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SellerController extends Controller
{
    public  function index(){
        $users=User::where('role','seller')->get();
        return view('supplier.seller.index',compact('users'));
    }
    public  function  create(){
        return view('supplier.seller.create');
    }
    public  function  store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'sometimes|nullable|required|string',
            'status_id' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'seller_address'=>'required|string|max:255',
            'seller_website'=>'required|string|max:255',
            'seller_nid'=>'required|numeric|digits_between:10,20',
            'password' => 'required|string|confirmed|min:8',
            'sr_name' => 'required|string|max:255',
            'sr_email' => 'required|string|max:255',
            'sr_phone' => 'required|string|max:255',
            'sr_image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(270,270)->save('image_seller/user/'.$name_gen);
        $img_url=$name_gen;

        $sr_image=$request->file('sr_image');
        $name_gen=hexdec(uniqid()).'.'.$sr_image->getClientOriginalExtension();
        Image::make($sr_image)->resize(600,600)->save('image_seller/user/'.$name_gen);
        $img_url2=$name_gen;

//        $seller_id=Helper::IDGenerator(new User,'seller_id',4,'SEL');
        $seller_id = IdGenerator::generate(['table' => 'users','field'=>'seller_id', 'length' => 10, 'prefix' =>'SELLER-']);
        $user=new User();
        $user->seller_id =$seller_id;
        $user->parent_id= auth()->user()->id;
        $user -> name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'seller';
        $user->image = $img_url;
        $user->password=bcrypt($request->password);
        $user->verification_code = sha1(time());
        $user->save();


        $seller = new Seller();
        $seller->seller_id=$seller_id;
        $seller->seller_name=$request->name;
        $seller->seller_address=$request->seller_address;
        $seller->seller_website=$request->seller_website;
        $seller->seller_telephone=$request->phone;
        $seller->seller_email=$request->email;
        $seller->seller_nid=$request->seller_nid;
        $seller->user_id=$user->id;
        $seller->sr_image=$img_url2;
        $seller->sr_name=$request->sr_name;
        $seller->sr_phone=$request->sr_phone;
        $seller->sr_email=$request->sr_email;
        $seller->save();

        if($user != null){
            EmailController::sendSignupEmail($user->name,$user->email,$user->verification_code);
            Session::flash('success','Account has been created. Please check email for verification link.');
            return redirect()->route('supplier.seller.index');
        }

        Session::flash('warning','Something went wrong!');
        return redirect()->back();



    }
    public  function  delete($id){
        $user=User::findOrFail($id);
        $seller=Seller::where('user_id',$id)->first();
        $image='image_seller/user/'.$user->image;
        $sr_image='image_seller/user/'.$seller->sr_image;
        unlink($image);
        unlink($sr_image);

        $user->delete();
        $seller->delete();
        Session::flash('success','Seller Deleted successfully!!');
        return redirect()->back();

    }

    //Seller edit view
    public function edit($id){
        $user = User::find($id);
        $seller=Seller::where('user_id',$id)->first();
        return view('supplier.seller.edit',compact('user','seller'));
    }

    //Seller update

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
        Session::flash('success','Seller updated successfully!!');
        return redirect()->route('supplier.seller.index');



    }


    //Seller profile view
        public function profile($id){
        $user = User::find($id);

        $seller=Seller::where('user_id',$id)->first();

            return view('supplier.seller.profile',compact('seller','user'));
    }
}
