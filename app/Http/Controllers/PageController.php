<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function main()
    {
        return view('home');
    }


    public function details()
    {
        return view('details');
    }

    public function contact()
    {
        return view('contact');
    }

    public function offers()
    {
        return view('offers');
    }
}
