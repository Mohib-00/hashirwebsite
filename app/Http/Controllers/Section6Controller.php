<?php

namespace App\Http\Controllers;

use App\Models\Section6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section6Controller extends Controller
{
     public function section6()
    {
        $user = Auth::user();
        $section6s = Section6::all();
        return view('admin.section6',compact('section6s'),[
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

        $section6 = new Section6();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section6->image = $imageName;
        }

        $section6->heading = $request->heading;
        $section6->paragraph = $request->paragraph;
        $section6->points_headings = $request->points_headings;
        $section6->point = $request->point;
        $section6->save();

        return response()->json([
            'status' => 'success',
            'section6' => $section6
        ]);
    }


    public function edit($id)
{
    $section6 = Section6::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section6' => $section6
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section6_id' => 'required|exists:section6,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'points_headings' => 'nullable',
        'point' => 'nullable',
    ]);

    $section6 = Section6::findOrFail($request->section6_id);

    $section6->heading   = $request->heading;
    $section6->paragraph = $request->paragraph;
    $section6->points_headings = $request->points_headings;
    $section6->point = $request->point;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section6->image = $imageName;
    }


    $section6->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section6 updated successfully!',
        'section6' => $section6
    ]);
}

public function destroy($id)
{
    $section6 = Section6::find($id);

    if (!$section6) {
        return response()->json([
            'status' => 'error',
            'message' => 'section6 not found.'
        ], 404);
    }

    if ($section6->image && file_exists(public_path('logos/' . $section6->image))) {
        unlink(public_path('logos/' . $section6->image));
    }
    
    $section6->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section6 deleted successfully!',
        'id' => $id
    ]);
}
}
