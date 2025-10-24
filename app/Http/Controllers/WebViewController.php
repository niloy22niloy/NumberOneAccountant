<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebViewController extends Controller
{
    //
    public function home()
    {
        return view('web-view.index');
    }
    public function pricing()
    {
        return view('web-view.pricing');
    }
    public function about()
    {
        return view('web-view.about');
    }
    public function contact()
    {
        return view('web-view.contact');
    }
     public function legal()
     {
     return view('web-view.legal');
     }
}
