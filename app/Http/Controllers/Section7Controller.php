<?php

namespace App\Http\Controllers;

use App\Models\Section7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section7Controller extends Controller
{
    public function section7()
    {
        $user = Auth::user();
        $section7s = Section7::all();
        return view('admin.section7',compact('section7s'),[
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

        $section7 = new Section7();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section7->image = $imageName;
        }

        $section7->heading = $request->heading;
        $section7->paragraph = $request->paragraph;
        $section7->save();

        return response()->json([
            'status' => 'success',
            'section7' => $section7
        ]);
    }


    public function edit($id)
{
    $section7 = Section7::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section7' => $section7
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section7_id' => 'required|exists:section7,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $section7 = Section7::findOrFail($request->section7_id);

    $section7->heading   = $request->heading;
    $section7->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section7->image = $imageName;
    }


    $section7->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section7 updated successfully!',
        'section7' => $section7
    ]);
}

public function destroy($id)
{
    $section7 = Section7::find($id);

    if (!$section7) {
        return response()->json([
            'status' => 'error',
            'message' => 'section7 not found.'
        ], 404);
    }

    if ($section7->image && file_exists(public_path('logos/' . $section7->image))) {
        unlink(public_path('logos/' . $section7->image));
    }
    
    $section7->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section7 deleted successfully!',
        'id' => $id
    ]);
}
}
