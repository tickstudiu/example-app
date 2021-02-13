<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        // check validate input form
        $request->validate([
            'name'           => 'required|max:50',
            'email'          => 'required|email|max:50',
            'mobile_number'  => 'required|numeric',
            'message'        => 'required|max:500',
        ]);

        // create inquiry information
        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->message = $request->message;
        $inquiry->email = $request->email;
        $inquiry->mobile_number = $request->mobile_number;

        // save inquiry
        $inquiry->save();

        echo 'done';
    }

    public function change(Request $request)
    {
        // check validate input form
        $request->validate([
            'id'           => 'required|numeric',
            'name'           => 'required|max:50',
            'email'          => 'required|email|max:50',
            'mobile_number'  => 'required|numeric',
            'message'        => 'required|max:500',
        ]);

        // create inquiry information
        Inquiry::where('id', $request->id)->update(array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'message' => $request->message,
        ));

        echo 'done';
    }
}
