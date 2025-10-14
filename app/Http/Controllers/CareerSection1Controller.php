<?php

namespace App\Http\Controllers;

use App\Models\CareerSection1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerSection1Controller extends Controller
{
    public function careerssection1()
    {
        $user = Auth::user();
        $careerssection1s = CareerSection1::all();
        return view('admin.careerssection1',compact('careerssection1s'),[
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

        $careerssection1 = new CareerSection1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $careerssection1->image = $imageName;
        }

        $careerssection1->heading = $request->heading;
        $careerssection1->paragraph = $request->paragraph;
        $careerssection1->save();

        return response()->json([
            'status' => 'success',
            'careerssection1' => $careerssection1
        ]);
    }


    public function edit($id)
{
    $careerssection1 = CareerSection1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'careerssection1' => $careerssection1
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'careerssection1_id' => 'required|exists:career_section1s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $careerssection1 = CareerSection1::findOrFail($request->careerssection1_id);

    $careerssection1->heading   = $request->heading;
    $careerssection1->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $careerssection1->image = $imageName;
    }


    $careerssection1->save();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection1 updated successfully!',
        'careerssection1' => $careerssection1
    ]);
}

public function destroy($id)
{
    $careerssection1 = CareerSection1::find($id);

    if (!$careerssection1) {
        return response()->json([
            'status' => 'error',
            'message' => 'careerssection1 not found.'
        ], 404);
    }

    if ($careerssection1->image && file_exists(public_path('logos/' . $careerssection1->image))) {
        unlink(public_path('logos/' . $careerssection1->image));
    }
    
    $careerssection1->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection1 deleted successfully!',
        'id' => $id
    ]);
}
}
