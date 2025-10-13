<?php

namespace App\Http\Controllers;

use App\Models\AboutSection2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutSection2Controller extends Controller
{
    public function aboutsection2()
    {
        $user = Auth::user();
        $aboutsection2s = AboutSection2::all();
        return view('admin.aboutsection2',compact('aboutsection2s'),[
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

        $aboutsection2 = new AboutSection2();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $aboutsection2->image = $imageName;
        }

        $aboutsection2->heading = $request->heading;
        $aboutsection2->paragraph = $request->paragraph;
        $aboutsection2->save();

        return response()->json([
            'status' => 'success',
            'aboutsection2' => $aboutsection2
        ]);
    }


    public function edit($id)
{
    $aboutsection2 = AboutSection2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'aboutsection2' => $aboutsection2
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'aboutsection2_id' => 'required|exists:about_section2s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $aboutsection2 = AboutSection2::findOrFail($request->aboutsection2_id);

    $aboutsection2->heading   = $request->heading;
    $aboutsection2->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $aboutsection2->image = $imageName;
    }


    $aboutsection2->save();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection2 updated successfully!',
        'aboutsection2' => $aboutsection2
    ]);
}

public function destroy($id)
{
    $aboutsection2 = AboutSection2::find($id);

    if (!$aboutsection2) {
        return response()->json([
            'status' => 'error',
            'message' => 'aboutsection2 not found.'
        ], 404);
    }

    if ($aboutsection2->image && file_exists(public_path('logos/' . $aboutsection2->image))) {
        unlink(public_path('logos/' . $aboutsection2->image));
    }
    
    $aboutsection2->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection2 deleted successfully!',
        'id' => $id
    ]);
}
}
