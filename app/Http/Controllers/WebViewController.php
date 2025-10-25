<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class WebViewController extends Controller
{
    //
    public function home()
    {
        $hero = HeroSection::first();
        return view('web-view.index',compact('hero'));
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
