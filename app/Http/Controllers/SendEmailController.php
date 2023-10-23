<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Session;

class SendEmailController extends Controller
{
    function index() {
        return view('layouts.lainnya.popup.form-mail');
        // return view('send_email');
    }

    function send(Request $request) {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);

            $data = array(
                'name'      =>  $request->name,
                'email' => $request->email,
                'message'   =>   $request->message
            );

        Mail::to('banturumah4@gmail.com')->send(new SendMail($data));
        // Store a success message in the session
        Session::flash('success', 'Terima kasih telah menghubungi kami! Email telah berhasil dikirim.');

        return back();
    }
}