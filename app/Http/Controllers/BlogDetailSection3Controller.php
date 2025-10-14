<?php

namespace App\Http\Controllers;

use App\Models\BlogDetailSection3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailSection3Controller extends Controller
{
    public function blogdetailsection3()
    {
        $user = Auth::user();
        $blogdetailsection3s = BlogDetailSection3::all();
        $main_heading_count = BlogDetailSection3::whereNotNull('main_heading')->count();
        return view('admin.blogdetailsection3',compact('blogdetailsection3s','main_heading_count'),[
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

        $blogdetailsection3 = new BlogDetailSection3();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogdetailsection3->image = $imageName;
        }

        $blogdetailsection3->heading = $request->heading;
        $blogdetailsection3->paragraph = $request->paragraph;
        $blogdetailsection3->main_heading = $request->main_heading;
        $blogdetailsection3->slug = $request->slug;
        $blogdetailsection3->save();

        return response()->json([
            'status' => 'success',
            'blogdetailsection3' => $blogdetailsection3
        ]);
    }


    public function edit($id)
{
    $blogdetailsection3 = BlogDetailSection3::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogdetailsection3' => $blogdetailsection3
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogdetailsection3_id' => 'required|exists:blog_detail_section3s,id',
        'heading'   => 'nullable',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading'     => 'nullable',
        'slug'     => 'nullable',
    ]);

    $blogdetailsection3 = BlogDetailSection3::findOrFail($request->blogdetailsection3_id);

    $blogdetailsection3->heading   = $request->heading;
    $blogdetailsection3->paragraph = $request->paragraph;
    $blogdetailsection3->main_heading = $request->main_heading;
    $blogdetailsection3->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogdetailsection3->image = $imageName;
    }


    $blogdetailsection3->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection3 updated successfully!',
        'blogdetailsection3' => $blogdetailsection3
    ]);
}

public function destroy($id)
{
    $blogdetailsection3 = BlogDetailSection3::find($id);

    if (!$blogdetailsection3) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogdetailsection3 not found.'
        ], 404);
    }

    if ($blogdetailsection3->image && file_exists(public_path('logos/' . $blogdetailsection3->image))) {
        unlink(public_path('logos/' . $blogdetailsection3->image));
    }
    
    $blogdetailsection3->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection3 deleted successfully!',
        'id' => $id
    ]);
}
}
