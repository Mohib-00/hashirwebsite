<?php

namespace App\Http\Controllers;

use App\Models\Section10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section10Controller extends Controller
{
    public function section10()
    {
        $user = Auth::user();
        $section10s = Section10::all();
        return view('admin.section10',compact('section10s'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable',
            'paragraph' => 'nullable',
        ]);

        $section10 = new Section10();

        $section10->heading = $request->heading;
        $section10->paragraph = $request->paragraph;
        $section10->save();

        return response()->json([
            'status' => 'success',
            'section10' => $section10
        ]);
    }


    public function edit($id)
{
    $section10 = Section10::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section10' => $section10
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section10_id' => 'required|exists:section10,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
    ]);

    $section10 = Section10::findOrFail($request->section10_id);

    $section10->heading   = $request->heading;
    $section10->paragraph = $request->paragraph;

    $section10->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section10 updated successfully!',
        'section10' => $section10
    ]);
}

public function destroy($id)
{
    $section10 = Section10::find($id);

    if (!$section10) {
        return response()->json([
            'status' => 'error',
            'message' => 'section10 not found.'
        ], 404);
    }

    if ($section10->image && file_exists(public_path('logos/' . $section10->image))) {
        unlink(public_path('logos/' . $section10->image));
    }
    
    $section10->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section10 deleted successfully!',
        'id' => $id
    ]);
}
}
