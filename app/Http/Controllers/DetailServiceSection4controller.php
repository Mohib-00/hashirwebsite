<?php

namespace App\Http\Controllers;

use App\Models\DetailServiceSection4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailServiceSection4controller extends Controller
{
    public function detailsservicesection4()
    {
        $user = Auth::user();
        $detailsservicesection4s = DetailServiceSection4::all();
        return view('admin.detailsservicesection4',compact('detailsservicesection4s'),[
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
            'slug' => 'nullable',
        ]);

        $detailsservicesection4 = new DetailServiceSection4();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $detailsservicesection4->image = $imageName;
        }

        $detailsservicesection4->heading = $request->heading;
        $detailsservicesection4->paragraph = $request->paragraph;
        $detailsservicesection4->slug = $request->slug;
        $detailsservicesection4->save();

        return response()->json([
            'status' => 'success',
            'detailsservicesection4' => $detailsservicesection4
        ]);
    }


    public function edit($id)
{
    $detailsservicesection4 = DetailServiceSection4::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'detailsservicesection4' => $detailsservicesection4
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'detailsservicesection4_id' => 'required|exists:detail_service_section4s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'slug' => 'nullable',
    ]);

    $detailsservicesection4 = DetailServiceSection4::findOrFail($request->detailsservicesection4_id);

    $detailsservicesection4->heading   = $request->heading;
    $detailsservicesection4->paragraph = $request->paragraph;
    $detailsservicesection4->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $detailsservicesection4->image = $imageName;
    }


    $detailsservicesection4->save();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection4 updated successfully!',
        'detailsservicesection4' => $detailsservicesection4
    ]);
}

public function destroy($id)
{
    $detailsservicesection4 = DetailServiceSection4::find($id);

    if (!$detailsservicesection4) {
        return response()->json([
            'status' => 'error',
            'message' => 'detailsservicesection4 not found.'
        ], 404);
    }

    if ($detailsservicesection4->image && file_exists(public_path('logos/' . $detailsservicesection4->image))) {
        unlink(public_path('logos/' . $detailsservicesection4->image));
    }
    
    $detailsservicesection4->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection4 deleted successfully!',
        'id' => $id
    ]);
}
}
