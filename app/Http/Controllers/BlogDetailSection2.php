<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailSection2 extends Controller
{
    public function blogdetailsection2()
    {
        $user = Auth::user();
        $blogdetailsection2s = \App\Models\BlogDetailSection2::all();
        return view('admin.blogdetailsection2',compact('blogdetailsection2s'),[
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

        $blogdetailsection2 = new \App\Models\BlogDetailSection2();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogdetailsection2->image = $imageName;
        }

        $blogdetailsection2->heading = $request->heading;
        $blogdetailsection2->paragraph = $request->paragraph;
        $blogdetailsection2->points_headings = $request->points_headings;
        $blogdetailsection2->point = $request->point;
        $blogdetailsection2->slug = $request->slug;
        $blogdetailsection2->save();

        return response()->json([
            'status' => 'success',
            'blogdetailsection2' => $blogdetailsection2
        ]);
    }


    public function edit($id)
{
    $blogdetailsection2 = \App\Models\BlogDetailSection2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogdetailsection2' => $blogdetailsection2
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogdetailsection2_id' => 'required|exists:detial_service_section2s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'points_headings' => 'nullable',
        'point' => 'nullable',
        'slug' => 'nullable',
    ]);

    $blogdetailsection2 = \App\Models\BlogDetailSection2::findOrFail($request->blogdetailsection2_id);

    $blogdetailsection2->heading   = $request->heading;
    $blogdetailsection2->paragraph = $request->paragraph;
    $blogdetailsection2->points_headings = $request->points_headings;
    $blogdetailsection2->point = $request->point;
    $blogdetailsection2->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogdetailsection2->image = $imageName;
    }


    $blogdetailsection2->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection2 updated successfully!',
        'blogdetailsection2' => $blogdetailsection2
    ]);
}

public function destroy($id)
{
    $blogdetailsection2 = \App\Models\BlogDetailSection2::find($id);

    if (!$blogdetailsection2) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogdetailsection2 not found.'
        ], 404);
    }

    if ($blogdetailsection2->image && file_exists(public_path('logos/' . $blogdetailsection2->image))) {
        unlink(public_path('logos/' . $blogdetailsection2->image));
    }
    
    $blogdetailsection2->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection2 deleted successfully!',
        'id' => $id
    ]);
}
}
