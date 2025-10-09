<?php

namespace App\Http\Controllers;

use App\Models\Section9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section9Controller extends Controller
{
    public function section9()
    {
        $user = Auth::user();
        $section9s = Section9::all();
        return view('admin.section9',compact('section9s'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

   public function store(Request $request)
{
    $request->validate([
        'image' => 'nullable',
    ]);

    $section9 = new Section9();

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section9->image = $imageName;
    }

    $section9->save();

    return response()->json([
        'status' => 'success',
        'section9' => $section9, // ensure full model object is returned
    ]);
}



    public function edit($id)
{
    $section9 = Section9::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section9' => $section9
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section9_id' => 'required|exists:section9,id',
        
        'image'     => 'nullable',
    ]);

    $section9 = Section9::findOrFail($request->section9_id);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section9->image = $imageName;
    }


    $section9->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section9 updated successfully!',
        'section9' => $section9
    ]);
}

public function destroy($id)
{
    $section9 = Section9::find($id);

    if (!$section9) {
        return response()->json([
            'status' => 'error',
            'message' => 'section9 not found.'
        ], 404);
    }

    if ($section9->image && file_exists(public_path('logos/' . $section9->image))) {
        unlink(public_path('logos/' . $section9->image));
    }
    
    $section9->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section9 deleted successfully!',
        'id' => $id
    ]);
}
}
