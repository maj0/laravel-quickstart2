<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Store a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        require __DIR__ . '/../Helpers/sendmail.php';
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required|max:1024',
        ]);

        $apikey = env('MAIL_APIKEY');
        if (empty($apikey)) {
            $request->session()->flash(
                'error',
                "Hi {$request->name}, your message is not sent, please contact our support."
            );
        } else {
            $subject = "Laravel project feedback";
            $to = array('feedback@mifon.tk');
            $from = "{$request->name}<{$request->email}>";
            $body = $request->message;
            $ret = send_mail($apikey, $subject, $body, $to, $from);
            #Session::flash('flash_message', 'Your message successfully sent!');
            $request->session()->flash('success', "Hi {$request->name},your message has been sent.");
        }

        return back();#redirect('/contact');
    }
}
