<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function index()
    {
        $users=User::all();
        return Inertia::render('Home',compact('users'));
    }
}
