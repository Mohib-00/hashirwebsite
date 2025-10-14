<?php

namespace App\Http\Controllers;

use App\Models\CareerSection2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerSection2Controller extends Controller
{
    public function careerssection2()
    {
        $user = Auth::user();
        $careerssection2s = CareerSection2::all();
        return view('admin.careerssection2',compact('careerssection2s'),[
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

        $careerssection2 = new CareerSection2();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $careerssection2->image = $imageName;
        }

        $careerssection2->heading = $request->heading;
        $careerssection2->paragraph = $request->paragraph;
        $careerssection2->points_headings = $request->points_headings;
        $careerssection2->point = $request->point;
        $careerssection2->save();

        return response()->json([
            'status' => 'success',
            'careerssection2' => $careerssection2
        ]);
    }


    public function edit($id)
{
    $careerssection2 = CareerSection2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'careerssection2' => $careerssection2
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'careerssection2_id' => 'required|exists:career_section2s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'points_headings' => 'nullable',
        'point' => 'nullable',
    ]);

    $careerssection2 = CareerSection2::findOrFail($request->careerssection2_id);

    $careerssection2->heading   = $request->heading;
    $careerssection2->paragraph = $request->paragraph;
    $careerssection2->points_headings = $request->points_headings;
    $careerssection2->point = $request->point;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $careerssection2->image = $imageName;
    }


    $careerssection2->save();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection2 updated successfully!',
        'careerssection2' => $careerssection2
    ]);
}

public function destroy($id)
{
    $careerssection2 = CareerSection2::find($id);

    if (!$careerssection2) {
        return response()->json([
            'status' => 'error',
            'message' => 'careerssection2 not found.'
        ], 404);
    }

    if ($careerssection2->image && file_exists(public_path('logos/' . $careerssection2->image))) {
        unlink(public_path('logos/' . $careerssection2->image));
    }
    
    $careerssection2->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection2 deleted successfully!',
        'id' => $id
    ]);
}
}
