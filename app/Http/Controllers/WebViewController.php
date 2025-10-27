<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
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
     public function contanct_us(Request $request)
     {
        $validated = $request->validate([
        'full_name' => 'required|string|max:100',
        'email' => 'required|email|unique:contact_us,email',
        'contact_number' => [
        'required',
        'regex:/^\+?[0-9\s\-\(\)]+$/', // allows +, spaces, -, ()
        'min:10',
        'max:20',
        ],
        'company' => 'nullable|string|max:150',
        'message' => 'nullable|string|max:500',
        ]);

        ContactUs::create($validated);

      return back()->with('success',"Successfully Created");
     }
     public function resource()
     {
        return view('web-view.resource');
     }
}
