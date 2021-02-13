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

    public function login()
    {
        if (session()->has('user'))
        {
            return redirect('/inquiry/read');
        }

        return view('login');
    }

    public function inquiryRead()
    {
        if (!session()->has('user'))
        {
            return redirect('/login');
        }

        $inquiry = Inquiry::all();
        return view('inquiry.read', ['inquiry' => $inquiry]);
    }

    public function inquiryCreate()
    {
        if (!session()->has('user'))
        {
            return redirect('/login');
        }

        return view('inquiry.create');
    }

    public function inquiryUpdate()
    {
        if (!session()->has('user'))
        {
            return redirect('/login');
        }

        $id = request()->get('id');
        $inquiry = Inquiry::where('id', $id)->get();
        return view('inquiry.update', ['inquiry' => $inquiry]);
    }
}
