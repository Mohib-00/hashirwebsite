<?php

namespace App\Http\Controllers;

use App\Models\BlogdetailSection4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailSection4Controller extends Controller
{
    public function blogdetailsection4()
    {
        $user = Auth::user();
        $blogdetailsection4s = BlogdetailSection4::all();
        return view('admin.blogdetailsection4',compact('blogdetailsection4s'),[
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

        $blogdetailsection4 = new BlogdetailSection4();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogdetailsection4->image = $imageName;
        }

        $blogdetailsection4->heading = $request->heading;
        $blogdetailsection4->paragraph = $request->paragraph;
        $blogdetailsection4->slug = $request->slug;
        $blogdetailsection4->save();

        return response()->json([
            'status' => 'success',
            'blogdetailsection4' => $blogdetailsection4
        ]);
    }


    public function edit($id)
{
    $blogdetailsection4 = BlogdetailSection4::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogdetailsection4' => $blogdetailsection4
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogdetailsection4_id' => 'required|exists:blogdetail_section4s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'slug' => 'nullable',
    ]);

    $blogdetailsection4 = BlogdetailSection4::findOrFail($request->blogdetailsection4_id);

    $blogdetailsection4->heading   = $request->heading;
    $blogdetailsection4->paragraph = $request->paragraph;
    $blogdetailsection4->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogdetailsection4->image = $imageName;
    }


    $blogdetailsection4->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection4 updated successfully!',
        'blogdetailsection4' => $blogdetailsection4
    ]);
}

public function destroy($id)
{
    $blogdetailsection4 = BlogdetailSection4::find($id);

    if (!$blogdetailsection4) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogdetailsection4 not found.'
        ], 404);
    }

    if ($blogdetailsection4->image && file_exists(public_path('logos/' . $blogdetailsection4->image))) {
        unlink(public_path('logos/' . $blogdetailsection4->image));
    }
    
    $blogdetailsection4->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection4 deleted successfully!',
        'id' => $id
    ]);
}
}
