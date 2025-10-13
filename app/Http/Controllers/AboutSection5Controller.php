<?php

namespace App\Http\Controllers;

use App\Models\AboutSection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutSection5Controller extends Controller
{
    public function aboutsection5()
    {
        $user = Auth::user();
        $aboutsection5s = AboutSection5::all();
        return view('admin.aboutsection5',compact('aboutsection5s'),[
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

        $aboutsection5 = new AboutSection5();
 
        $aboutsection5->heading = $request->heading;
        $aboutsection5->paragraph = $request->paragraph;
        $aboutsection5->save();

        return response()->json([
            'status' => 'success',
            'aboutsection5' => $aboutsection5
        ]);
    }


    public function edit($id)
{
    $aboutsection5 = AboutSection5::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'aboutsection5' => $aboutsection5
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'aboutsection5_id' => 'required|exists:about_section5s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
     ]);

    $aboutsection5 = AboutSection5::findOrFail($request->aboutsection5_id);

    $aboutsection5->heading   = $request->heading;
    $aboutsection5->paragraph = $request->paragraph;

    $aboutsection5->save();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection5 updated successfully!',
        'aboutsection5' => $aboutsection5
    ]);
}

public function destroy($id)
{
    $aboutsection5 = AboutSection5::find($id);

    if (!$aboutsection5) {
        return response()->json([
            'status' => 'error',
            'message' => 'aboutsection5 not found.'
        ], 404);
    }

    if ($aboutsection5->image && file_exists(public_path('logos/' . $aboutsection5->image))) {
        unlink(public_path('logos/' . $aboutsection5->image));
    }
    
    $aboutsection5->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'aboutsection5 deleted successfully!',
        'id' => $id
    ]);
}
}
