<?php

namespace App\Http\Controllers;

use App\Models\Section2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section2Controller extends Controller
{
    public function section2()
    {
        $user = Auth::user();
        $sliders = Section2::all();
        return view('admin.section2',compact('sliders'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }


     public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable',   
      
        ]);

        $slider = new Section2();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $slider->image = $imageName;
        }

      
        $slider->save();

        return response()->json([
            'status' => 'success',
            'slider' => $slider
        ]);
    }


    public function edit($id)
{
    $slider = Section2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'slider' => $slider
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'slider_id' => 'required|exists:section2,id',
        'image'     => 'nullable',
    ]);

    $slider = Section2::findOrFail($request->slider_id);

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $slider->image = $imageName;
    }


    $slider->save();

    return response()->json([
        'status' => 'success',
        'message' => 'slider updated successfully!',
        'slider' => $slider
    ]);
}

public function destroy($id)
{
    $slider = Section2::find($id);

    if (!$slider) {
        return response()->json([
            'status' => 'error',
            'message' => 'slider not found.'
        ], 404);
    }

    if ($slider->image && file_exists(public_path('logos/' . $slider->image))) {
        unlink(public_path('logos/' . $slider->image));
    }
    
    $slider->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'slider deleted successfully!',
        'id' => $id
    ]);
}
}
