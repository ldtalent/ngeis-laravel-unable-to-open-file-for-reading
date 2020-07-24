<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    //
    public function add(Request $request){
        $data = request()->validate([
            'email'=>['required','email'],
            'subject'=>['required'],
            'message'=>['required'],
            'image'=>['required','mimes:jpg,png,jpeg,gif,svg,','max:2080'],
        ]);
        $emailData = array(
            'email'=>$data['email'],
            'subject'=>$data['subject'],
            'message'=>$data['message'],
            'image'=>$data['image']
        );
        view()->share(compact('emailData'));
        $url = $request->file('image');
        $sendMail = \Mail::send('mails',$emailData,function ($message) use($data,$url){
            $email = $data['email'];
            $subject = $data['subject'];
            $message->to($email);
            $message->subject($subject);
            $message->attach(
                $url->getRealPath(),array(
                    'as'=>$url->getClientOriginalName(),
                    'mime'=>$url->getMimeType()
                )
            );
            $message->from(env('MAIL_USERNAME'));
        });
        if ($sendMail){
            Alert::error('Error');
            return redirect()->back();
        }
        else{
            Alert::success('Success');
            return redirect()->back();
        }
    }
}
