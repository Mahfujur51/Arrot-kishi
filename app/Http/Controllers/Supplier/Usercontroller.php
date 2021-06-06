<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','support')->latest()->paginate(10);
        return view('supplier.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'sometimes|nullable|digits:11',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->role = 'support';
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->name);
        $user->parent_id= auth()->user()->id;
        $image_url = null;
        if($request->has('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $image_url = $name_gen;
        }
        $user->image = $image_url;
        $user->verification_code = sha1(time());
        $user->save();

        if($user != null){
            EmailController::sendSignupEmail($user->name,$user->email,$user->verification_code);
            Session::flash('success','Account has been created. Please check email for verification link.');
            return redirect()->route('users.index');
        }

        Session::flash('warning','Something went wrong!');
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user->is_verified == 0){
            $user->is_verified = 1;
        }
        else{
            $user->is_verified = 0;
        }
        $user->save();
        Session::flash('info','User status has been changed!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('supplier.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$user->id,
            'phone' => 'sometimes|nullable|digits:11',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png|required|max:10000',
            'password' => 'sometimes|nullable|confirmed|min:6'
        ]);
        $data['role'] = 'support';
        if($request->has('password')) $data['password'] = Hash::make($data['password']);

        $path = 'users/'.$user->image;
        if($request->has('image')){
            if(file_exists(public_path($path))){
                unlink($path);
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('users/'.$name_gen);
            $data['image'] = $name_gen;
        }
        $user->update($data);

        Session::flash('success','Suport user created successfully!');
        return redirect()->route('users.index');
    }

    public function active($id)
    {
        $user = User::findOrFail($id);
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
