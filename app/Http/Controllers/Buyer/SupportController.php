<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Session;

// use Mail;

class SupportController extends Controller
{
    public function index(){
        return view('buyer.support.index');
    }


  public function sendMessage(Request $request)
  {
    //   dd($request->all());
      $request->validate([
          'name' => 'required|string',
          'phone' => 'sometimes|nullable|digits:11',
          'email' => 'required|email',
          'company' => 'sometimes|nullable',
          'message' => 'required'
      ]);

      $contact = new Contact;
      $contact->user_id = auth()->user()->id;
      $contact->buyer_id = auth()->user()->buyer_id;
      $contact->name = $request->name;
      $contact->phone = $request->phone;
      $contact->email = $request->email;
      $contact->company = $request->company;
      $contact->message = $request->message;
      $contact->save();

      if($contact != null){
          EmailController::contactMessageSend($contact->name,$contact->email,$contact->message);
          Session::flash('success','Message has been sent.');
          return redirect()->back();
      }

  }
}
