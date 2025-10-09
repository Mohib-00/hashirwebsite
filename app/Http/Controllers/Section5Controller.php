<?php

namespace App\Http\Controllers;

use App\Models\Section5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section5Controller extends Controller
{
    public function section5()
    {
        $user = Auth::user();
        $section5s = Section5::all();
        return view('admin.section5',compact('section5s'),[
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

        $section5 = new Section5();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section5->image = $imageName;
        }

        $section5->heading = $request->heading;
        $section5->paragraph = $request->paragraph;
        $section5->save();

        return response()->json([
            'status' => 'success',
            'section5' => $section5
        ]);
    }


    public function edit($id)
{
    $section5 = Section5::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section5' => $section5
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section5_id' => 'required|exists:section5,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $section5 = Section5::findOrFail($request->section5_id);

    $section5->heading   = $request->heading;
    $section5->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section5->image = $imageName;
    }


    $section5->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section5 updated successfully!',
        'section5' => $section5
    ]);
}

public function destroy($id)
{
    $section5 = Section5::find($id);

    if (!$section5) {
        return response()->json([
            'status' => 'error',
            'message' => 'section5 not found.'
        ], 404);
    }

    if ($section5->image && file_exists(public_path('logos/' . $section5->image))) {
        unlink(public_path('logos/' . $section5->image));
    }
    
    $section5->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section5 deleted successfully!',
        'id' => $id
    ]);
}
}
