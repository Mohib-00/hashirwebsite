<?php

namespace App\Http\Controllers;

use App\Models\AboutSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutSection3Controller extends Controller
{
    public function aboutsection3()
    {
        $user = Auth::user();
        $aboutsection3s = AboutSection3::all();
        $main_heading_count = AboutSection3::whereNotNull('main_heading')->count();
        $main_paragraph_count = AboutSection3::whereNotNull('main_paragraph')->count();
        return view('admin.aboutsection3',compact('aboutsection3s','main_heading_count','main_paragraph_count'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable',   
            'heading' => 'nullable',
            'paragraph' => 'nullable',
            'main_heading' => 'nullable',
            'main_paragraph' => 'nullable',
        ]);

        $aboutsection3 = new AboutSection3();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $aboutsection3->image = $imageName;
        }

        $aboutsection3->heading = $request->heading;
        $aboutsection3->paragraph = $request->paragraph;
        $aboutsection3->main_heading = $request->main_heading;
        $aboutsection3->main_paragraph = $request->main_paragraph;
        $aboutsection3->save();

        return response()->json([
            'status' => 'success',
            'aboutsection3' => $aboutsection3
        ]);
    }


    public function edit($id)
{
    $aboutsection3 = AboutSection3::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'aboutsection3' => $aboutsection3
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'aboutsection3_id' => 'required|exists:about_section3s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading' => 'nullable',
        'main_paragraph' => 'nullable',
    ]);

    $aboutsection3 = AboutSection3::findOrFail($request->aboutsection3_id);

    $aboutsection3->heading   = $request->heading;
    $aboutsection3->paragraph = $request->paragraph;
    $aboutsection3->main_heading = $request->main_heading;
    $aboutsection3->main_paragraph = $request->main_paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $aboutsection3->image = $imageName;
    }


    $aboutsection3->save();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection3 updated successfully!',
        'aboutsection3' => $aboutsection3
    ]);
}

public function destroy($id)
{
    $aboutsection3 = AboutSection3::find($id);

    if (!$aboutsection3) {
        return response()->json([
            'status' => 'error',
            'message' => 'aboutsection3 not found.'
        ], 404);
    }

    if ($aboutsection3->image && file_exists(public_path('logos/' . $aboutsection3->image))) {
        unlink(public_path('logos/' . $aboutsection3->image));
    }
    
    $aboutsection3->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection3 deleted successfully!',
        'id' => $id
    ]);
}
}
