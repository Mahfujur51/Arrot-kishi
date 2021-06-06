<?php

namespace App\Http\Controllers\Admin;
use App\Buyer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public  function  index(){
        $user=User::findOrFail(Auth::user()->id);
        return view('admin.profile.index',compact('user'));

    }
    public  function edit(){
        $user=User::findOrFail(Auth::user()->id);
       return view('admin.profile.edit',compact('user'));

    }
    public  function  update(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'sometimes|nullable|digits:11',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'sometimes|nullable|confirmed|min:6',

        ]);
        if(!empty($request->password)) {
            $data['password'] = Hash::make($data['password']);
        }

        $path = 'image_buyer/user/'.$user->image;
        if($request->has('image')){
            if(file_exists(public_path($path)))
                unlink($path);{
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('image_buyer/user/'.$name_gen);
            $data['image'] = $name_gen;
        }
        $user->update($data);

        Session::flash('success','Profile Updated successfully!');
        return redirect()->route('supplier.profile.index');

    }
}
