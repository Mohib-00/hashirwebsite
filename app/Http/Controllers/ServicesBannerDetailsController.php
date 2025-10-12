<?php

namespace App\Http\Controllers;

use App\Models\ServicesDetailsSection1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesBannerDetailsController extends Controller
{
    public function detailsservicesection1()
    {
        $user = Auth::user();
        $detailsservicesection1s = ServicesDetailsSection1::all();
        return view('admin.detailsservicesection1',compact('detailsservicesection1s'),[
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
            'slug' => 'nullable'
        ]);

        $detailsservicesection1 = new ServicesDetailsSection1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $detailsservicesection1->image = $imageName;
        }

        $detailsservicesection1->heading = $request->heading;
        $detailsservicesection1->paragraph = $request->paragraph;
        $detailsservicesection1->slug = $request->slug;
        $detailsservicesection1->save();

        return response()->json([
            'status' => 'success',
            'detailsservicesection1' => $detailsservicesection1
        ]);
    }


    public function edit($id)
{
    $detailsservicesection1 = ServicesDetailsSection1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'detailsservicesection1' => $detailsservicesection1
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'detailsservicesection1_id' => 'required|exists:services_details_section1s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'slug'     => 'nullable',
    ]);

    $detailsservicesection1 = ServicesDetailsSection1::findOrFail($request->detailsservicesection1_id);

    $detailsservicesection1->heading   = $request->heading;
    $detailsservicesection1->paragraph = $request->paragraph;
    $detailsservicesection1->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $detailsservicesection1->image = $imageName;
    }


    $detailsservicesection1->save();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection1 updated successfully!',
        'detailsservicesection1' => $detailsservicesection1
    ]);
}

public function destroy($id)
{
    $detailsservicesection1 = ServicesDetailsSection1::find($id);

    if (!$detailsservicesection1) {
        return response()->json([
            'status' => 'error',
            'message' => 'detailsservicesection1 not found.'
        ], 404);
    }

    if ($detailsservicesection1->image && file_exists(public_path('logos/' . $detailsservicesection1->image))) {
        unlink(public_path('logos/' . $detailsservicesection1->image));
    }
    
    $detailsservicesection1->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'detailsservicesection1 deleted successfully!',
        'id' => $id
    ]);
}
}
