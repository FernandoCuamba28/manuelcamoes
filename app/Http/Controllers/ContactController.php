<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function  contact(){
        return view('Cv');
    }

    public function sendEmail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'sub'=>$request->sub,
        ];

        Mail::to('manuelcamoes13@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','A sua mensagem foi enviada com sucesso');
    }
}
