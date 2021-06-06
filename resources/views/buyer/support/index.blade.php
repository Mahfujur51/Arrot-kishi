@extends('layouts.buyer-app')
@section('support', 'active')
@section('title', 'Support contact')
@section('page-styles')
    <link href="{{ asset('backend/css/contact.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <h1>Contact With Us</h1>
        @if (Session::has('message_sent'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message_sent') }}
            </div>
        @endif
        <p></p>
        <div class="contact-box">
            <div class="contact-right">
                <h3>Call Or Write</h3>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>support@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>+88012345678</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>1259 (4th Floor), Road 10 <br> Mirpur DOHS, Dhaka 1216 <br> Bangladesh</td>
                    </tr>
                </table>
            </div>
            <div class="contact-left">
                <h3>Send Your Request</h3>
                <form action="{{ route('support.send-message') }}" method="POST">
                    @csrf
                    <div class="input-row">
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name">
                            @error('name')
                                <span class="validation-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label>Company</label>
                            <input type="text" name="company" placeholder="Enter Your Company Name">
                            @error('name')
                                <span class="validation-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter Your Email">
                            @error('email')
                                <span class="validation-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label>Phone</label>
                            <input type="text" placeholder="Enter Your Phone" name="phone">
                            @error('phone')
                                <span class="validation-message" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea rows="5" placeholder="Type Your Message" name="message"></textarea>
                    @error('message')
                        <span class="validation-message" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit">SEND</button>

                </form>
            </div>

        </div>
    </div>
@endsection
@section('page-scripts')


@endsection
