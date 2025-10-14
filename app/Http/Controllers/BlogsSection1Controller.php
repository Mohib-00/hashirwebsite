<?php

namespace App\Http\Controllers;

use App\Models\BlogSection1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsSection1Controller extends Controller
{
    public function blogsection1()
    {
        $user = Auth::user();
        $blogsection1s = BlogSection1::all();
        return view('admin.blogsection1',compact('blogsection1s'),[
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

        $blogsection1 = new BlogSection1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogsection1->image = $imageName;
        }

        $blogsection1->heading = $request->heading;
        $blogsection1->paragraph = $request->paragraph;
        $blogsection1->save();

        return response()->json([
            'status' => 'success',
            'blogsection1' => $blogsection1
        ]);
    }


    public function edit($id)
{
    $blogsection1 = BlogSection1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogsection1' => $blogsection1
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogsection1_id' => 'required|exists:blog_section1s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
    ]);

    $blogsection1 = BlogSection1::findOrFail($request->blogsection1_id);

    $blogsection1->heading   = $request->heading;
    $blogsection1->paragraph = $request->paragraph;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogsection1->image = $imageName;
    }


    $blogsection1->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogsection1 updated successfully!',
        'blogsection1' => $blogsection1
    ]);
}

public function destroy($id)
{
    $blogsection1 = BlogSection1::find($id);

    if (!$blogsection1) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogsection1 not found.'
        ], 404);
    }

    if ($blogsection1->image && file_exists(public_path('logos/' . $blogsection1->image))) {
        unlink(public_path('logos/' . $blogsection1->image));
    }
    
    $blogsection1->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogsection1 deleted successfully!',
        'id' => $id
    ]);
}
}
