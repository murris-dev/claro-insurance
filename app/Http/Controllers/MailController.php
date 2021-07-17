<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Email;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function send() {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::to('eldelaluna@hotmail.com')->send(new \App\Mail\MyTestMail($details));
    }

    public function index() {
        $emails = Auth::user()->emails;

        // $emails = Email::where('user_id', Auth::id())->get();

        // dd($emails);   
        return view('mail.mail', ['emails' => $emails]);
    }

    public function create() {


        return view('mail.create');
    }

    public function store(Request $request) {
        $email = new Email();

        $email->destination = $request->destination;
        $email->title = $request->title;
        $email->message = $request->message;
        $email->send_to = false;

        $email->user_id = Auth::id();

        $email->save();

        return redirect()->route('mail');
    }
}
