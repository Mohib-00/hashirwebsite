<?php

namespace App\Http\Controllers;

use App\Models\DetailServiceSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailServiceSection3controller extends Controller
{
    public function detailsservicesection3()
    {
        $user = Auth::user();
        $detailsservicesection3s = DetailServiceSection3::all();
        $main_heading_count = DetailServiceSection3::whereNotNull('main_heading')->count();
        return view('admin.detailsservicesection3',compact('detailsservicesection3s','main_heading_count'),[
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
            'slug' => 'nullable',
        ]);

        $detailsservicesection3 = new DetailServiceSection3();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $detailsservicesection3->image = $imageName;
        }

        $detailsservicesection3->heading = $request->heading;
        $detailsservicesection3->paragraph = $request->paragraph;
        $detailsservicesection3->main_heading = $request->main_heading;
        $detailsservicesection3->slug = $request->slug;
        $detailsservicesection3->save();

        return response()->json([
            'status' => 'success',
            'detailsservicesection3' => $detailsservicesection3
        ]);
    }


    public function edit($id)
{
    $detailsservicesection3 = DetailServiceSection3::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'detailsservicesection3' => $detailsservicesection3
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'detailsservicesection3_id' => 'required|exists:detail_service_section3s,id',
        'heading'   => 'nullable',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading'     => 'nullable',
        'slug'     => 'nullable',
    ]);

    $detailsservicesection3 = DetailServiceSection3::findOrFail($request->detailsservicesection3_id);

    $detailsservicesection3->heading   = $request->heading;
    $detailsservicesection3->paragraph = $request->paragraph;
    $detailsservicesection3->main_heading = $request->main_heading;
    $detailsservicesection3->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $detailsservicesection3->image = $imageName;
    }


    $detailsservicesection3->save();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection3 updated successfully!',
        'detailsservicesection3' => $detailsservicesection3
    ]);
}

public function destroy($id)
{
    $detailsservicesection3 = DetailServiceSection3::find($id);

    if (!$detailsservicesection3) {
        return response()->json([
            'status' => 'error',
            'message' => 'detailsservicesection3 not found.'
        ], 404);
    }

    if ($detailsservicesection3->image && file_exists(public_path('logos/' . $detailsservicesection3->image))) {
        unlink(public_path('logos/' . $detailsservicesection3->image));
    }
    
    $detailsservicesection3->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection3 deleted successfully!',
        'id' => $id
    ]);
}
}
