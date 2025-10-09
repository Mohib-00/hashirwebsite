<?php

namespace App\Http\Controllers;

use App\Models\Section3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section3Controller extends Controller
{
      public function section3()
    {
        $user = Auth::user();
        $section3s = Section3::all();
        return view('admin.section3',compact('section3s'),[
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

        $section3 = new Section3();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section3->image = $imageName;
        }

        $section3->heading = $request->heading;
        $section3->paragraph = $request->paragraph;
        $section3->save();

        return response()->json([
            'status' => 'success',
            'section3' => $section3
        ]);
    }


    public function edit($id)
{
    $section3 = Section3::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section3' => $section3
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section3_id' => 'required|exists:section3,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $section3 = Section3::findOrFail($request->section3_id);

    $section3->heading   = $request->heading;
    $section3->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section3->image = $imageName;
    }


    $section3->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section3 updated successfully!',
        'section3' => $section3
    ]);
}

public function destroy($id)
{
    $section3 = Section3::find($id);

    if (!$section3) {
        return response()->json([
            'status' => 'error',
            'message' => 'section3 not found.'
        ], 404);
    }

    if ($section3->image && file_exists(public_path('logos/' . $section3->image))) {
        unlink(public_path('logos/' . $section3->image));
    }
    
    $section3->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section3 deleted successfully!',
        'id' => $id
    ]);
}
}
