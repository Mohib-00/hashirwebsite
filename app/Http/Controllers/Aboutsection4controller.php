<?php

namespace App\Http\Controllers;

use App\Models\AboutSection4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Aboutsection4controller extends Controller
{
    public function aboutsection4()
    {
        $user = Auth::user();
        $aboutsection4s = AboutSection4::all();
        return view('admin.aboutsection4',compact('aboutsection4s'),[
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
            'points_headings' => 'nullable',
            'point' => 'nullable',
        ]);

        $aboutsection4 = new AboutSection4();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $aboutsection4->image = $imageName;
        }

        $aboutsection4->heading = $request->heading;
        $aboutsection4->paragraph = $request->paragraph;
        $aboutsection4->points_headings = $request->points_headings;
        $aboutsection4->point = $request->point;
        $aboutsection4->save();

        return response()->json([
            'status' => 'success',
            'aboutsection4' => $aboutsection4
        ]);
    }


    public function edit($id)
{
    $aboutsection4 = AboutSection4::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'aboutsection4' => $aboutsection4
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'aboutsection4_id' => 'required|exists:aboutsection4,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'points_headings' => 'nullable',
        'point' => 'nullable',
    ]);

    $aboutsection4 = AboutSection4::findOrFail($request->aboutsection4_id);

    $aboutsection4->heading   = $request->heading;
    $aboutsection4->paragraph = $request->paragraph;
    $aboutsection4->points_headings = $request->points_headings;
    $aboutsection4->point = $request->point;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $aboutsection4->image = $imageName;
    }


    $aboutsection4->save();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection4 updated successfully!',
        'aboutsection4' => $aboutsection4
    ]);
}

public function destroy($id)
{
    $aboutsection4 = AboutSection4::find($id);

    if (!$aboutsection4) {
        return response()->json([
            'status' => 'error',
            'message' => 'aboutsection4 not found.'
        ], 404);
    }

    if ($aboutsection4->image && file_exists(public_path('logos/' . $aboutsection4->image))) {
        unlink(public_path('logos/' . $aboutsection4->image));
    }
    
    $aboutsection4->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection4 deleted successfully!',
        'id' => $id
    ]);
}
}
