<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingsController extends Controller
{
    //

    public function edit()
    {
        $settings = WebsiteSetting::first(); // Assuming only one row
        return view('admin.website-settings.edit', compact('settings'));
    }

  public function update(Request $request)
{
    $request->validate([
        'address' => 'required|string',
        'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        'facebook' => 'nullable|url',
        'youtube' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
    ]);

    $settings = WebsiteSetting::first();

    if (!$settings) {
        $settings = new WebsiteSetting();
    }

    $settings->address = $request->address;
    $settings->facebook = $request->facebook;
    $settings->youtube = $request->youtube;
    $settings->instagram = $request->instagram;
    $settings->linkedin = $request->linkedin;

    // Handle logo upload in public/website-settings
    if ($request->hasFile('logo')) {
        $logoFile = $request->file('logo');

        // Delete old logo if exists
        if ($settings->logo && file_exists(public_path($settings->logo))) {
            unlink(public_path($settings->logo));
        }

        $fileName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
        $logoFile->move(public_path('website-settings'), $fileName);

        // Save relative path in DB
        $settings->logo = 'website-settings/' . $fileName;
    }

    $settings->save();

    return redirect()->back()->with('success', 'Website settings updated successfully!');
}

}
