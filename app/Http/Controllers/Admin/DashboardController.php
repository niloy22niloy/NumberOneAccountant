<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About_first;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {

        $hero = HeroSection::first() ;
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
        return view('admin.about',compact('About_first','About_second_section','about_card'));
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
        $data = $request->validate([
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

}
