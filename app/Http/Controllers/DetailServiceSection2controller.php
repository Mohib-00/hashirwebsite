<?php

namespace App\Http\Controllers;

use App\Models\DetialServiceSection2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailServiceSection2controller extends Controller
{
    public function detailsservicesection2()
    {
        $user = Auth::user();
        $detailsservicesection2s = DetialServiceSection2::all();
        return view('admin.detailsservicesection2',compact('detailsservicesection2s'),[
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
            'slug' => 'nullable',
        ]);

        $detailsservicesection2 = new DetialServiceSection2();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $detailsservicesection2->image = $imageName;
        }

        $detailsservicesection2->heading = $request->heading;
        $detailsservicesection2->paragraph = $request->paragraph;
        $detailsservicesection2->points_headings = $request->points_headings;
        $detailsservicesection2->point = $request->point;
        $detailsservicesection2->slug = $request->slug;
        $detailsservicesection2->save();

        return response()->json([
            'status' => 'success',
            'detailsservicesection2' => $detailsservicesection2
        ]);
    }


    public function edit($id)
{
    $detailsservicesection2 = DetialServiceSection2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'detailsservicesection2' => $detailsservicesection2
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'detailsservicesection2_id' => 'required|exists:detial_service_section2s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'points_headings' => 'nullable',
        'point' => 'nullable',
        'slug' => 'nullable',
    ]);

    $detailsservicesection2 = DetialServiceSection2::findOrFail($request->detailsservicesection2_id);

    $detailsservicesection2->heading   = $request->heading;
    $detailsservicesection2->paragraph = $request->paragraph;
    $detailsservicesection2->points_headings = $request->points_headings;
    $detailsservicesection2->point = $request->point;
    $detailsservicesection2->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $detailsservicesection2->image = $imageName;
    }


    $detailsservicesection2->save();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection2 updated successfully!',
        'detailsservicesection2' => $detailsservicesection2
    ]);
}

public function destroy($id)
{
    $detailsservicesection2 = DetialServiceSection2::find($id);

    if (!$detailsservicesection2) {
        return response()->json([
            'status' => 'error',
            'message' => 'detailsservicesection2 not found.'
        ], 404);
    }

    if ($detailsservicesection2->image && file_exists(public_path('logos/' . $detailsservicesection2->image))) {
        unlink(public_path('logos/' . $detailsservicesection2->image));
    }
    
    $detailsservicesection2->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection2 deleted successfully!',
        'id' => $id
    ]);
}
}
