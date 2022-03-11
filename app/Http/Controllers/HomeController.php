<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){

        if(Auth::check())
        {
            $todos = auth()->user()->todos();
            return view('welcome', compact('todos'));
        }

            return Redirect::route('login')->withInput()->with('errmessage', 'Please Login to access restricted area.');

        }
}
