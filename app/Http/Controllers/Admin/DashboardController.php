<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About_first;
use App\Models\ContactUs;
use App\Models\HeroSection;
use App\Models\LegalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {

        $hero = HeroSection::first();
        return view('admin.home', compact('hero'));
    }
    public function update(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'button1_text' => 'string|max:255',
            'button1_link' => 'string|max:255',
            'button2_text' => 'string|max:255',
            'button2_link' => 'string|max:255',
            'video' => 'mimes:mp4,avi,mov', // 20 MB
        ]);


        if ($request->hasFile('video')) {

            // Define the folder path
            $folderPath = public_path('herosection');

            // Create folder if not exists
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath);
            }

            // Handle the uploaded video
            $video = $request->file('video');
            $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
            $video->move($folderPath, $videoName);
            $videoPath = 'herosection/' . $videoName;

            // Save path to database
            $data['video'] = $videoPath;
        }
        $hero = HeroSection::first();
        if ($hero) {
            $hero->update($data);
            $hero->save();
        } else {
            // return $data;
            HeroSection::create($data);
        }

        return redirect()->back()->with('success', 'Hero Section updated successfully!');
    }
    public function about()
    {
        $About_first = About_first::first();
        $About_second_section = \App\Models\About_second_section::first();
        $about_card = \App\Models\About_card::all();
        $about_third_section = \App\Models\About_third_section::first();
        $about_third_section_cards = \App\Models\About_third_section_card::all();
        $about_last_section = \App\Models\About_last_section::first();
        return view('admin.about', compact('About_first', 'About_second_section', 'about_card', 'about_third_section',
        'about_third_section_cards','about_last_section'));
    }
    public function about_first_section_post(Request $request)
    {
        // return About_first::all();
        // return $request->all();
        $data = $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
        ]);

        $About_first = About_first::first();
        if ($About_first) {
            $About_first->update($data);
            $About_first->save();
        } else {
            About_first::create($data);
        }

        return redirect()->back()->with('success', 'About First Section updated successfully!');
    }
    public function about_second_section_post(Request $request)
    {
        $data = $request->validate([
            'second_title' => 'required|string',
            'second_subtitle' => 'required|string',
        ]);

        $aboutSecond = \App\Models\About_second_section::first();

        if ($aboutSecond) {
            $aboutSecond->update($data);
        } else {
            \App\Models\About_second_section::create($data);
        }

        // 🔹 Use a different session key for success message
        return redirect()->back()->with('success_second', 'About Second Section updated successfully!');
    }
    public function about_second_section_card_post(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'icon'  => 'required',
            'card_title' => 'required|string',
            'card_description' => 'required|string',
        ]);

        \App\Models\About_card::create($data);

        return redirect()->back()->with('success_card', 'About Second Section Card added successfully!');
    }
    public function about_card_update(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'card_id' => 'required|exists:about_cards,id',
            'icon' => 'nullable|string',
            'card_title' => 'required|string',
            'card_description' => 'required|string',
        ]);

        $aboutCard = \App\Models\About_card::find($data['card_id']);
        if ($aboutCard) {
            $aboutCard->update([
                'icon' => $data['icon'] ?? null,
                'card_title' => $data['card_title'],
                'card_description' => $data['card_description'],
            ]);
        }

        return redirect()->back()->with('success_card', 'About Second Section Card updated successfully!');
    }
    public function about_card_delete($id)
    {
        $aboutCard = \App\Models\About_card::find($id);
        if ($aboutCard) {
            $aboutCard->delete();
        }

        return redirect()->back()->with('success_card', 'About Second Section Card deleted successfully!');
    }
    public function about_third_section_post(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'third_title' => 'required|string',
            'third_subtitle' => 'required|string',
        ]);

        // \App\Models\About_third_section::create($data);

        // return redirect()->back()->with('success_third', 'About Third Section added successfully!');
        $about_third_section = \App\Models\About_third_section::first();

        if ($about_third_section) {
            $about_third_section->update($data);
        } else {
            \App\Models\About_third_section::create($data);
        }
        return back()->with('success_third', "Successfully Created");
    }
    public function about_third_section_card_post(Request $request)
    {
        $data = $request->validate([
            'third_icon' => 'required|string',
            'third_title' => 'required|string',
        ]);

        \App\Models\About_third_section_card::create($data);

        return redirect()->back()->with('success_third_card', 'About Third Section Card added successfully!');
    }

    public function about_third_section_card_update(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'card_id' => 'required|exists:about_third_section_cards,id',
            'third_icon' => 'required|string',
            'third_title' => 'required|string',
        ]);

        $aboutThirdCard = \App\Models\About_third_section_card::find($data['card_id']);
        if ($aboutThirdCard) {
            $aboutThirdCard->update([
                'third_icon' => $data['third_icon'],
                'third_title' => $data['third_title'],
            ]);
        }

        return redirect()->back()->with('success_third_card', 'About Third Section Card updated successfully!');
    }
    public function about_third_section_card_delete($id)
    {
        $aboutThirdCard = \App\Models\About_third_section_card::find($id);
        if ($aboutThirdCard) {
            $aboutThirdCard->delete();
        }

        return redirect()->back()->with('success_third_card', 'About Third Section Card deleted successfully!');
    }
    public function about_last_section_post(Request $request)
    {

        $data = $request->validate([
            'last_title' => 'required',
            'last_subtitle' => 'required|string',
            'last_link' => 'required|string',
        ]);

        $about_last_section = \App\Models\About_last_section::first();
        if ($about_last_section) {
            $about_last_section->update([
                $data
            ]);
        } else {
            \App\Models\About_last_section::create($data);
        }

        return redirect()->back()->with('success_last', 'About Third Section Card updated successfully!');
    }
    public function contact()
    {
        $contacts = ContactUs::orderBy('id','desc')->get(); // Fetch all contacts, newest first
        return view('admin.contact', compact('contacts'));
    }
    public function contact_delete($id)
    {
        ContactUs::find($id)->delete();
        return back()->with('success',"Successfully Deleted");
    }
    public function admin_legal_documentation()
    {
        $documents = LegalDocument::latest()->get();
        $legal_docuemt_content = \App\Models\LeagDocumentContent::first();
        return view('admin.legal_documentation',compact('documents','legal_docuemt_content'));
    }
    public function legal_store(Request $request)
    {
         $request->validate([
         'title' => 'required|string|max:255',
         'category' => 'required|string|max:100',
         'file' => 'required|mimes:pdf,doc,docx,xls,xlsx', // max 20MB
         ]);

         $file = $request->file('file');
         $folderPath = public_path('uploads/legal_docs');

         if (!File::exists($folderPath)) {
         File::makeDirectory($folderPath, 0755, true);
         }

         $fileName = time() . '_' . $file->getClientOriginalName();
         $file->move($folderPath, $fileName);

         LegalDocument::create([
         'title' => $request->title,
         'category' => $request->category,
         'file_name' => $fileName,
         'file_path' => 'uploads/legal_docs/' . $fileName,
         'file_type' => $file->getClientOriginalExtension(),
         ]);

         return redirect()->back()->with('success', 'Document uploaded successfully!');
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
      public function legal_update(Request $request){
        $request->validate([
        'main_title' => 'required|string|max:255',
        'short_title' => 'required|string|max:255',
        ]);

        // You can have one record for the page title (id=1)
        $page = \App\Models\LeagDocumentContent::firstOrNew(['id' => 1]);
        $page->main_title = $request->main_title;
        $page->short_title = $request->short_title;
        $page->save();

        return back()->with('success', 'Legal documentation titles updated successfully!');
      }
      
      public function resources()
      {
        return view('admin.resources');
      }
      public function module_store(Request $request) {
      $request->validate([
      'name' => 'required|string|max:255',
      ]);

      Module::create([
      'name' => $request->name,
      'description' => $request->description,
      ]);

      return redirect()->back()->with('success', 'Module added successfully!');
      }
}
