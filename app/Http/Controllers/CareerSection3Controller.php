<?php

namespace App\Http\Controllers;

use App\Models\CareerSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerSection3Controller extends Controller
{
    public function careerssection3()
    {
        $user = Auth::user();
        $careerssection3s = CareerSection3::all();
        $main_heading_count = CareerSection3::whereNotNull('main_heading')->count();
        $main_paragraph_count = CareerSection3::whereNotNull('main_paragraph')->count();
        return view('admin.careerssection3',compact('careerssection3s','main_heading_count','main_paragraph_count'),[
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
            'main_heading' => 'nullable',
            'main_paragraph' => 'nullable',
        ]);

        $careerssection3 = new CareerSection3();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $careerssection3->image = $imageName;
        }

        $careerssection3->heading = $request->heading;
        $careerssection3->paragraph = $request->paragraph;
        $careerssection3->main_heading = $request->main_heading;
        $careerssection3->main_paragraph = $request->main_paragraph;
        $careerssection3->save();

        return response()->json([
            'status' => 'success',
            'careerssection3' => $careerssection3
        ]);
    }


    public function edit($id)
{
    $careerssection3 = CareerSection3::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'careerssection3' => $careerssection3
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'careerssection3_id' => 'required|exists:career_section3s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading' => 'nullable',
        'main_paragraph' => 'nullable',
    ]);

    $careerssection3 = CareerSection3::findOrFail($request->careerssection3_id);

    $careerssection3->heading   = $request->heading;
    $careerssection3->paragraph = $request->paragraph;
    $careerssection3->main_heading = $request->main_heading;
    $careerssection3->main_paragraph = $request->main_paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $careerssection3->image = $imageName;
    }


    $careerssection3->save();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection3 updated successfully!',
        'careerssection3' => $careerssection3
    ]);
}

public function destroy($id)
{
    $careerssection3 = CareerSection3::find($id);

    if (!$careerssection3) {
        return response()->json([
            'status' => 'error',
            'message' => 'careerssection3 not found.'
        ], 404);
    }

    if ($careerssection3->image && file_exists(public_path('logos/' . $careerssection3->image))) {
        unlink(public_path('logos/' . $careerssection3->image));
    }
    
    $careerssection3->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection3 deleted successfully!',
        'id' => $id
    ]);
}
}
