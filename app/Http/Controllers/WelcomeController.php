<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            return view('instagram.home-guest');
        }
        return view('instagram.home-user');
    }
}
