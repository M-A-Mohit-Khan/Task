<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class LoginController extends Controller
{
    //
    public function index()
    {
        //$users=User::all();
        return Inertia::render('Login');
    }
    public function userLogin(Request $request)
    {
        //$users=User::all();
        //dd($request->input('password'));
        if(($request->input('email')=='m.a.mohit.khan@gmail.com')&&($request->input('password')=="1234"))
        {
            return Inertia::location('insert-question');
        }
        return Inertia::location('/');
    }
}
