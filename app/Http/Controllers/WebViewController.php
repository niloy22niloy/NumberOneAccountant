<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\HeroSection;
use App\Models\pricing_plans;
use Illuminate\Http\Request;

class WebViewController extends Controller
{
    //
    public function home()
    {
        $hero = HeroSection::first();

        $monthly_pricing = pricing_plans::where('homepage_show', 1)
            ->where('billing_cycle', 'Monthly')
            ->orderBy('id', 'desc')
            ->where('status',1)
            ->get();

        $annually_pricing = pricing_plans::where('homepage_show', 1)
            ->where('billing_cycle', 'Annually')
            ->orderBy('id', 'desc')
            ->Where('status',1)
            ->get();

        return view('web-view.index', compact('hero', 'monthly_pricing', 'annually_pricing'));
    }
    public function pricing()
    {
        $monthly_pricing = pricing_plans::
            where('billing_cycle', 'Monthly')
            ->orderBy('id', 'desc')
            ->where('status',1)
            ->get();

        $annually_pricing = pricing_plans::
            where('billing_cycle', 'Annually')
            ->orderBy('id', 'desc')
            ->Where('status',1)
            ->get();
        return view('web-view.pricing',compact('monthly_pricing','annually_pricing'));
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

        return back()->with('success', "Successfully Created");
    }
    public function resource()
    {
        return view('web-view.resource');
    }
}
