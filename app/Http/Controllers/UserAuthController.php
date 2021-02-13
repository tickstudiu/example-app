<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->session()->put('user', $request['username']);
        return redirect('/inquiry/read');
    }

    public function logout()
    {
        if (session()->has('user'))
        {
            session()->pull('user');
        }

        return redirect('/login');
    }
}
