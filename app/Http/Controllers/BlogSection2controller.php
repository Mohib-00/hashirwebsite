<?php

namespace App\Http\Controllers;

use App\Models\BlogSection2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogSection2controller extends Controller
{
    public function blogsection2()
    {
        $user = Auth::user();
        $blogsection2s = BlogSection2::all();
        $main_heading_count = BlogSection2::whereNotNull('main_heading')->count();
        $main_paragraph_count = BlogSection2::whereNotNull('main_paragraph')->count();
        return view('admin.blogsection2',compact('blogsection2s','main_heading_count','main_paragraph_count'),[
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
            'main_paragraph' => 'nullable',
            'links' => 'nullable',
        ]);

        $blogsection2 = new BlogSection2();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogsection2->image = $imageName;
        }

        $blogsection2->heading = $request->heading;
        $blogsection2->paragraph = $request->paragraph;
        $blogsection2->main_heading = $request->main_heading;
        $blogsection2->main_paragraph = $request->main_paragraph;
        $blogsection2->links = $request->links;
        $blogsection2->save();

        return response()->json([
            'status' => 'success',
            'blogsection2' => $blogsection2
        ]);
    }


    public function edit($id)
{
    $blogsection2 = BlogSection2::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogsection2' => $blogsection2
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogsection2_id' => 'required|exists:blog_section2s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'main_heading' => 'nullable',
            'main_paragraph' => 'nullable',
            'links' => 'nullable',
    ]);

    $blogsection2 = blogsection2::findOrFail($request->blogsection2_id);

    $blogsection2->heading   = $request->heading;
    $blogsection2->paragraph = $request->paragraph;
    $blogsection2->main_heading = $request->main_heading;
        $blogsection2->main_paragraph = $request->main_paragraph;
        $blogsection2->links = $request->links;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogsection2->image = $imageName;
    }


    $blogsection2->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogsection2 updated successfully!',
        'blogsection2' => $blogsection2
    ]);
}

public function destroy($id)
{
    $blogsection2 = BlogSection2::find($id);

    if (!$blogsection2) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogsection2 not found.'
        ], 404);
    }

    if ($blogsection2->image && file_exists(public_path('logos/' . $blogsection2->image))) {
        unlink(public_path('logos/' . $blogsection2->image));
    }
    
    $blogsection2->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogsection2 deleted successfully!',
        'id' => $id
    ]);
}
}
