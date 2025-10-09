<?php

namespace App\Http\Controllers;

use App\Models\Section8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section8Controller extends Controller
{
    public function section8()
    {
        $user = Auth::user();
        $section8s = Section8::all();
        return view('admin.section8',compact('section8s'),[
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
            'main_paragraph' => 'nullable',
        ]);

        $section8 = new Section8();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section8->image = $imageName;
        }

        $section8->heading = $request->heading;
        $section8->paragraph = $request->paragraph;
         $section8->main_paragraph = $request->main_paragraph;
        $section8->save();

        return response()->json([
            'status' => 'success',
            'section8' => $section8
        ]);
    }


    public function edit($id)
{
    $section8 = Section8::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section8' => $section8
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section8_id' => 'required|exists:section8,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_paragraph' => 'nullable',
    ]);

    $section8 = Section8::findOrFail($request->section8_id);

    $section8->heading   = $request->heading;
    $section8->paragraph = $request->paragraph;
    $section8->main_paragraph = $request->main_paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section8->image = $imageName;
    }


    $section8->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section8 updated successfully!',
        'section8' => $section8
    ]);
}

public function destroy($id)
{
    $section8 = Section8::find($id);

    if (!$section8) {
        return response()->json([
            'status' => 'error',
            'message' => 'section8 not found.'
        ], 404);
    }

    if ($section8->image && file_exists(public_path('logos/' . $section8->image))) {
        unlink(public_path('logos/' . $section8->image));
    }
    
    $section8->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section8 deleted successfully!',
        'id' => $id
    ]);
}
}
