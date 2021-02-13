<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('contact');
    }

    public function inquiryRead()
    {
        $inquiry = Inquiry::all();
        return view('inquiry.read', ['inquiry' => $inquiry]);
    }

    public function inquiryCreate()
    {
        return view('inquiry.create');
    }
}
