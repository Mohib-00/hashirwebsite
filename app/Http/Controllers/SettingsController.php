<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function adminprofile()
    {
        $user = Auth::user();
        return view('admin.profile', [
            'userName' => $user->name,
            'userEmail' => $user->email
        ]);
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($user->image && File::exists(public_path('images/' . $user->image))) {
            File::delete(public_path('images/' . $user->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    if ($request->filled('name')) {
        $user->name = $request->name;
    }
    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Profile updated successfully!',
        'image' => $user->image ? asset('images/' . $user->image) : null, 
        'name' => $user->name,
        'email' => $user->email
    ]);
}

public function websitesettings()
    {
        $user = Auth::user();
        $settings = Setting::all();
        return view('admin.setting',compact('settings'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable',   
            'number' => 'nullable',
            'email' => 'nullable',
            'section5_heading' => 'nullable',
            'section6_heading' => 'nullable',
            'section8_heading' => 'nullable',
            'section8_paragraph' => 'nullable',
            'section9_heading' => 'nullable',
            'section10_heading' => 'nullable',
            'section11_heading' => 'nullable',
            'footer_paragraph' => 'nullable',
            'location' => 'nullable',
            'facebook_link' => 'nullable',
            'instagram_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'youtube_link' => 'nullable',
            'twitter_link' => 'nullable',
        ]);

        $setting = new Setting();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $setting->image = $imageName;
        }

        $setting->number = $request->number;
        $setting->email = $request->email;
        $setting->section5_heading = $request->section5_heading;
        $setting->section6_heading = $request->section6_heading;
        $setting->section8_heading = $request->section8_heading;
        $setting->section8_paragraph = $request->section8_paragraph;
        $setting->section9_heading = $request->section9_heading;
        $setting->section10_heading = $request->section10_heading;
        $setting->section11_heading = $request->section11_heading;
        $setting->footer_paragraph = $request->footer_paragraph;
        $setting->location = $request->location;
        $setting->facebook_link = $request->facebook_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->save();

        return response()->json([
            'status' => 'success',
            'setting' => $setting
        ]);
    }


    public function edit($id)
{
    $setting = Setting::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'setting' => $setting
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'setting_id' => 'required|exists:settings,id',
         'image' => 'nullable',   
            'number' => 'nullable',
            'email' => 'nullable',
            'section5_heading' => 'nullable',
            'section6_heading' => 'nullable',
            'section8_heading' => 'nullable',
            'section8_paragraph' => 'nullable',
            'section9_heading' => 'nullable',
            'section10_heading' => 'nullable',
            'section11_heading' => 'nullable',
            'footer_paragraph' => 'nullable',
            'location' => 'nullable',
            'facebook_link' => 'nullable',
            'instagram_link' => 'nullable',
            'linkedin_link' => 'nullable',
            'youtube_link' => 'nullable',
            'twitter_link' => 'nullable',
    ]);

    $setting = Setting::findOrFail($request->setting_id);

    $setting->number = $request->number;
        $setting->email = $request->email;
        $setting->section5_heading = $request->section5_heading;
        $setting->section6_heading = $request->section6_heading;
        $setting->section8_heading = $request->section8_heading;
        $setting->section8_paragraph = $request->section8_paragraph;
        $setting->section9_heading = $request->section9_heading;
        $setting->section10_heading = $request->section10_heading;
        $setting->section11_heading = $request->section11_heading;
        $setting->footer_paragraph = $request->footer_paragraph;
        $setting->location = $request->location;
        $setting->facebook_link = $request->facebook_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->twitter_link = $request->twitter_link;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $setting->image = $imageName;
    }


    $setting->save();

    return response()->json([
        'status' => 'success',
        'message' => 'setting updated successfully!',
        'setting' => $setting
    ]);
}

public function destroy($id)
{
    $setting = Setting::find($id);

    if (!$setting) {
        return response()->json([
            'status' => 'error',
            'message' => 'setting not found.'
        ], 404);
    }

    if ($setting->image && file_exists(public_path('logos/' . $setting->image))) {
        unlink(public_path('logos/' . $setting->image));
    }
    
    $setting->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'setting deleted successfully!',
        'id' => $id
    ]);
}
}
