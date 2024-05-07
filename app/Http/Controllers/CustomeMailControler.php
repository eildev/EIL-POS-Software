<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerSendEmail;

class CustomeMailControler extends Controller
{
    public function CustomerSendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'recipients' => 'required',

        ]);
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $recipients = $request->input('recipients');
        // $ccRecipients = $request->input('cc_recipients');

         //     foreach ($recipients as $recipient) {
         //         Mail::to($recipient)->cc($ccRecipients)->send(new CustomerSendEmail($data));
         //     }
            // dd($recipients);
            foreach ($recipients as $recipient) {
                Mail::to($recipient)->send(new CustomerSendEmail($data));
            }

        $notification = array(
            'message' => 'Email Send Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('email.To.Customer.Page')->with($notification);
    }
}
