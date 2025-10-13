<?php

namespace App\Http\Controllers;

use App\Models\AboutSection1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutSection1Controller extends Controller
{
    public function aboutsection1()
    {
        $user = Auth::user();
        $aboutsection1s = AboutSection1::all();
        return view('admin.aboutsection1',compact('aboutsection1s'),[
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
        ]);

        $aboutsection1 = new AboutSection1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $aboutsection1->image = $imageName;
        }

        $aboutsection1->heading = $request->heading;
        $aboutsection1->paragraph = $request->paragraph;
        $aboutsection1->save();

        return response()->json([
            'status' => 'success',
            'aboutsection1' => $aboutsection1
        ]);
    }


    public function edit($id)
{
    $aboutsection1 = AboutSection1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'aboutsection1' => $aboutsection1
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'aboutsection1_id' => 'required|exists:about_section1s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $aboutsection1 = AboutSection1::findOrFail($request->aboutsection1_id);

    $aboutsection1->heading   = $request->heading;
    $aboutsection1->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $aboutsection1->image = $imageName;
    }


    $aboutsection1->save();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection1 updated successfully!',
        'aboutsection1' => $aboutsection1
    ]);
}

public function destroy($id)
{
    $aboutsection1 = AboutSection1::find($id);

    if (!$aboutsection1) {
        return response()->json([
            'status' => 'error',
            'message' => 'aboutsection1 not found.'
        ], 404);
    }

    if ($aboutsection1->image && file_exists(public_path('logos/' . $aboutsection1->image))) {
        unlink(public_path('logos/' . $aboutsection1->image));
    }
    
    $aboutsection1->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection1 deleted successfully!',
        'id' => $id
    ]);
}
}
