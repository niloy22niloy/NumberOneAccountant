<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
