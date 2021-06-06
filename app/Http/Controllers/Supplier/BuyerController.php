<?php

namespace App\Http\Controllers\Supplier;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Session;
use Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BuyerController extends Controller
{
    public  function index(){
        $users=User::where('role','buyer')->get();
        return view('supplier.buyer.index',compact('users'));
    }
    //Buyer Created Code
    public  function  create(){
        return view('supplier.buyer.create');
    }

    //Buyer Store Code
    public  function  store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
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
            'password' => 'required|string|confirmed|min:8',
            'br_name' => 'sometimes|nullable|string|max:255',
            'br_email' => 'sometimes|nullable|string|max:255',
            'br_phone' => 'sometimes|nullable|string|max:255',
            'br_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $img_url2 = null;
        if($request->has('trade_license')){
            $trade_license=$request->file('trade_license');
            $name_gen=hexdec(uniqid()).'.'.$trade_license->getClientOriginalExtension();
            Image::make($trade_license)->resize(600,600)->save('image_buyer/user/'.$name_gen);
            $img_url2=$name_gen;
        }
        $img_url3 = null;
       if($request->has('buyer_logo')){
        $buyer_logo=$request->file('buyer_logo');
        $name_gen=hexdec(uniqid()).'.'.$buyer_logo->getClientOriginalExtension();
        Image::make($buyer_logo)->resize(295,65)->save('image_buyer/user/'.$name_gen);
        $img_url3=$name_gen;
       }
       $img_url4 = null;
       if($request->has('br_image')){
           $br_image=$request->file('br_image');
           $name_gen=hexdec(uniqid()).'.'.$br_image->getClientOriginalExtension();
           Image::make($br_image)->resize(250,250)->save('image_buyer/user/'.$name_gen);
           $img_url4=$name_gen;
       }


        $buyer_id = IdGenerator::generate(['table' => 'users','field'=>'buyer_id', 'length' => 9, 'prefix' =>'BUYER-']);
//        $buyer_id=Helper::IDGenerator(new User,'buyer_id',4,'BUY');
        $user=new User();
        $user->buyer_id=$buyer_id;
        $user->parent_id= auth()->user()->id;
        $user -> name = $request -> name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'buyer';
        $user->image=$img_url3;
        $user->password=bcrypt($request->password);
        $user->verification_code = sha1(time());
        $user->save();


        $buyer = new Buyer();
        $buyer->buyer_id=$buyer_id;
        $buyer->buyer_name=$request->name;
        $buyer->buyer_address=$request->buyer_address;
        $buyer->buyer_website=$request->buyer_website;
        $buyer->buyer_telephone=$request->phone;
        $buyer->buyer_email=$request->email;
        $buyer->buyer_nid=$request->buyer_nid;
        $buyer->buyer_type=$request->buyer_type;
        $buyer->expire_date=$request->expire_date;
        $buyer->tagline=$request->tagline;
        $buyer->user_id=$user->id;
        $buyer->trade_license=$img_url2;
        $buyer->buyer_logo=$img_url3;
        $buyer->br_image=$img_url4;
        $buyer->br_name=$request->br_name;
        $buyer->br_phone=$request->br_phone;
        $buyer->br_email=$request->br_email;
        $buyer->save();

        if($user != null){
            EmailController::sendSignupEmail($user->name,$user->email,$user->verification_code);
            Session::flash('success','Account has been created. Please check email for verification link.');
            return redirect()->route('supplier.buyer.index');
        }

        Session::flash('warning','Something went wrong!!');
        return redirect()->back();



    }

//    Buyer deleted Code
    public  function  delete($id){
        $user=User::findOrFail($id);
        $buyer=Buyer::where('user_id',$id)->first();

        $image='image_buyer/user/'.$user->image;
        $br_image='image_buyer/user/'.$buyer->br_image;
        $trade_license='image_buyer/user/'.$buyer->trade_license;
        $buyer_logo='image_buyer/user/'.$buyer->buyer_logo;


            unlink($br_image);
            unlink($buyer_logo);
            unlink($trade_license);
            $user->delete();
            $buyer->delete();

        Session::flash('success','Buyer Deleted successfully!!');
        return redirect()->back();
    }

    //Buyer Edit view
    public function edit($id){
        $user = User::find($id);
        $buyer=Buyer::where('user_id',$id)->first();
        return view('supplier.buyer.edit',compact('user','buyer'));
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
            Image::make($buyer_logo)->resize(295,65)->save('image_buyer/user/'.$name_gen);
            $img_url3=$name_gen;

        }
        if ($request->has('br_image')){
            if(file_exists(public_path($br_image))){
                unlink($br_image);
            }
            $br_image=$request->file('br_image');
            $name_gen=hexdec(uniqid()).'.'.$buyer_logo->getClientOriginalExtension();
            Image::make($br_image)->resize(295,65)->save('image_buyer/user/'.$name_gen);
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
        Session::flash('success','Buyer updated successfully!!');
        return redirect()->route('supplier.buyer.index');



    }


    //Buyer profile view
        public function profile($id){
        $user = User::find($id);

        $buyer=Buyer::where('user_id',$id)->first();

            return view('supplier.buyer.profile',compact('buyer','user'));
    }

}
