<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailer;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check validate input form
        $request->validate([
            'name'           => 'required|max:50',
            'email'          => 'required|email|max:50',
            'mobile_number'  => 'required|numeric',
            'message'        => 'required|max:500',
        ]);

        // create details 
        $details = [
            'from' => $request->email,
            'to' => 'tickstudiu@gmail.com',
            'subject' => 'Laravel Mail Service',
            'title' => $request->name,
            "body"  => $request->message
        ];

        // create contact information
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->message = $request->message;
        $contact->email = $request->email;
        $contact->mobile_number = $request->mobile_number;

        // save contact
        $contact->save();

        // send email
        Mail::to($details['to'])->send(new Mailer($details));

        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'data'    => $details,
                'message' => 'Nnot sending mail.. retry again...'
            ]);
        }

        return response()->json([
            'status'  => true,
            'data'    => $details,
            'message' => 'Your details mailed successfully'
        ]);
    }
}