<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SignupEmail;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function contactMessageSend($contact_name,$contact_email,$message)
    {
        $data = [
            'name' => $contact_name,
            'message' => $message,
            'email' => $contact_email
        ];
        Mail::to(env('MAIL_USERNAME'))->send(new ContactMessage($data));
    }
}
