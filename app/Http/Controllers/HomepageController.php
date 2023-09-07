<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        return view('layouts.homepage.home');
    }

    public function service()
    {
        return view('layouts.homepage.service');
    }

    public function about()
    {
        return view('layouts.homepage.about');
    }
}
