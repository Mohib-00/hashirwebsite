<?php

namespace App\Http\Controllers;

use App\Models\CareerSection4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerSection4Controller extends Controller
{
     public function careerssection4()
    {
        $user = Auth::user();
        $careerssection4s = CareerSection4::all();
        $main_heading_count = CareerSection4::whereNotNull('main_heading')->count();
         return view('admin.careerssection4',compact('careerssection4s','main_heading_count'),[
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
            'links' => 'nullable',
        ]);

        $careerssection4 = new CareerSection4();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $careerssection4->image = $imageName;
        }

        $careerssection4->heading = $request->heading;
        $careerssection4->paragraph = $request->paragraph;
        $careerssection4->main_heading = $request->main_heading;
        $careerssection4->links = $request->links;
        $careerssection4->save();

        return response()->json([
            'status' => 'success',
            'careerssection4' => $careerssection4
        ]);
    }


    public function edit($id)
{
    $careerssection4 = CareerSection4::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'careerssection4' => $careerssection4
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'careerssection4_id' => 'required|exists:career_section4s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading' => 'nullable',
            'links' => 'nullable',
    ]);

    $careerssection4 = CareerSection4::findOrFail($request->careerssection4_id);

    $careerssection4->heading   = $request->heading;
    $careerssection4->paragraph = $request->paragraph;
    $careerssection4->main_heading = $request->main_heading;
        $careerssection4->links = $request->links;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $careerssection4->image = $imageName;
    }


    $careerssection4->save();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection4 updated successfully!',
        'careerssection4' => $careerssection4
    ]);
}

public function destroy($id)
{
    $careerssection4 = CareerSection4::find($id);

    if (!$careerssection4) {
        return response()->json([
            'status' => 'error',
            'message' => 'careerssection4 not found.'
        ], 404);
    }

    if ($careerssection4->image && file_exists(public_path('logos/' . $careerssection4->image))) {
        unlink(public_path('logos/' . $careerssection4->image));
    }
    
    $careerssection4->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'careerssection4 deleted successfully!',
        'id' => $id
    ]);
}
}
