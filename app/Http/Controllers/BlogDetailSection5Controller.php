<?php

namespace App\Http\Controllers;

use App\Models\Blogdetailsection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailSection5Controller extends Controller
{
    public function blogdetailsection5()
    {
        $user = Auth::user();
        $blogdetailsection5s = Blogdetailsection5::all();
        $main_heading_count = Blogdetailsection5::whereNotNull('main_heading')->count();
        return view('admin.blogdetailsection5',compact('blogdetailsection5s','main_heading_count'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable',
            'paragraph' => 'nullable',
            'slug' => 'nullable',
            'main_heading' => 'nullable',
        ]);

        $blogdetailsection5 = new blogdetailsection5();

        $blogdetailsection5->heading = $request->heading;
        $blogdetailsection5->paragraph = $request->paragraph;
        $blogdetailsection5->slug = $request->slug;
        $blogdetailsection5->main_heading = $request->main_heading;
        $blogdetailsection5->save();

        return response()->json([
            'status' => 'success',
            'blogdetailsection5' => $blogdetailsection5
        ]);
    }


    public function edit($id)
{
    $blogdetailsection5 = blogdetailsection5::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogdetailsection5' => $blogdetailsection5
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogdetailsection5_id' => 'required|exists:blogdetailsection5s,id',
        'heading'   => 'nullable',
        'paragraph' => 'nullable',
        'slug' => 'nullable',
        'main_heading'   => 'nullable',
    ]);

    $blogdetailsection5 = blogdetailsection5::findOrFail($request->blogdetailsection5_id);

    $blogdetailsection5->heading   = $request->heading;
    $blogdetailsection5->paragraph = $request->paragraph;
    $blogdetailsection5->slug = $request->slug;
    $blogdetailsection5->main_heading = $request->main_heading;

    $blogdetailsection5->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection5 updated successfully!',
        'blogdetailsection5' => $blogdetailsection5
    ]);
}

public function destroy($id)
{
    $blogdetailsection5 = blogdetailsection5::find($id);

    if (!$blogdetailsection5) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogdetailsection5 not found.'
        ], 404);
    }

    if ($blogdetailsection5->image && file_exists(public_path('logos/' . $blogdetailsection5->image))) {
        unlink(public_path('logos/' . $blogdetailsection5->image));
    }
    
    $blogdetailsection5->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection5 deleted successfully!',
        'id' => $id
    ]);
}
}
