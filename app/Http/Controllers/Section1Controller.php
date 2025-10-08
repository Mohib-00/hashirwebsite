<?php

namespace App\Http\Controllers;

use App\Models\Section1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section1Controller extends Controller
{
     public function section1()
    {
        $user = Auth::user();
        $banners = Section1::all();
        return view('admin.section1',compact('banners'),[
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

        $banner = new Section1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $banner->image = $imageName;
        }

        $banner->heading = $request->heading;
        $banner->paragraph = $request->paragraph;
        $banner->save();

        return response()->json([
            'status' => 'success',
            'banner' => $banner
        ]);
    }


    public function edit($id)
{
    $banner = Section1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'banner' => $banner
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'banner_id' => 'required|exists:section1,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $banner = Section1::findOrFail($request->banner_id);

    $banner->heading   = $request->heading;
    $banner->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $banner->image = $imageName;
    }


    $banner->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Banner updated successfully!',
        'banner' => $banner
    ]);
}

public function destroy($id)
{
    $banner = Section1::find($id);

    if (!$banner) {
        return response()->json([
            'status' => 'error',
            'message' => 'Banner not found.'
        ], 404);
    }

    if ($banner->image && file_exists(public_path('logos/' . $banner->image))) {
        unlink(public_path('logos/' . $banner->image));
    }
    
    $banner->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Banner deleted successfully!',
        'id' => $id
    ]);
}
}
