<?php

namespace App\Http\Controllers;

use App\Models\About_card;
use App\Models\About_first;
use App\Models\About_last_section;
use App\Models\About_second_section;
use App\Models\About_third_section;
use App\Models\About_third_section_card;
use App\Models\ContactUs;
use App\Models\HeroSection;
use App\Models\LegalDocument;
use App\Models\ModulePosts;
use App\Models\pricing_plans;
use App\Models\ResourceModule;
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
        $about_first_section = About_first::first();
        $about_second_section = About_second_section::first();
        $about_second_section_card = About_card::all();
        $about_third_section = About_third_section::first();
        $about_third_section_card = About_third_section_card::all();
        $about_last_section = About_last_section::first();
        return view('web-view.about',compact('about_first_section','about_second_section','about_second_section_card','about_third_section','about_third_section_card','about_last_section'));
    }
    public function contact()
    {
        return view('web-view.contact');
    }
    public function legal()
    {
        $legal_document_content = \App\Models\LeagDocumentContent::first();
         $legal_documents = LegalDocument::all();
        return view('web-view.legal',compact('legal_document_content','legal_documents'));
    }
    public function download($id)
    {
        $document = LegalDocument::findOrFail($id);
        return response()->download(public_path($document->file_path));
    }

    public function view($id)
    {
        $document = LegalDocument::findOrFail($id);
        return response()->file(public_path($document->file_path));
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
        $resources = ResourceModule::with('modulePosts')->get();
        return view('web-view.resource',compact('resources'));
    }
    public function post_show($id){
        $post = ModulePosts::with('resourceModule')->findOrFail($id);
    return view('web-view.post_show', compact('post'));

    }
}
