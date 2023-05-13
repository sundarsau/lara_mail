<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailLog;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\DB;
class MailController extends Controller
{
    public function sendMail(){
        $title = "Send Mail";
        return view('send_mail', compact('title'));
    }
    public function postSendMail(Request $request){
        $request->validate(
            [
                'to_email'    => 'required|email|max:255',
                'subject'     => 'required|max:255',
                'mail_body'   => 'required',
            ]
        );

        DB::beginTransaction();
        try {
            $mail = new MailLog;
            $mail->from_email   = env('MAIL_FROM_ADDRESS', 'admin@test.com');
            $mail->to_email     = $request->to_email;
            $mail->subject      = $request->subject;
            $mail->mail_body    = $request->mail_body;
            
            $mail_body = $mail->mail_body;
            $mail->save();

            // send mail

            Mail::send('mail.mail_template', ['mail_body' => $mail_body], function ($message) use ($request) {
                $message->to($request->to_email);
                $message->subject($request->subject);
            });
            DB::commit();
            return redirect("/")->withSuccess('Email is sent to ' . $request->to_email);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect("/")->withErrors('Some Error occurred, please try later');
        }
    }
}
