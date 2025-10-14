<?php

namespace App\Http\Controllers;

use App\Models\blogsDetailsSection1;
use App\Models\BlogSection2;
use App\Models\Section4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogDetailSection1 extends Controller
{
    public function blogdetailsection1()
    {
        $user = Auth::user();
        $blogdetailsection1s = \App\Models\BlogDetailSection1::all();
        return view('admin.blogdetailsection1',compact('blogdetailsection1s'),[
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

        $blogdetailsection1 = new \App\Models\BlogDetailSection1();

       

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $blogdetailsection1->image = $imageName;
        }

        $blogdetailsection1->heading = $request->heading;
        $blogdetailsection1->paragraph = $request->paragraph;
        $blogdetailsection1->slug = $request->slug;
        $blogdetailsection1->save();

        return response()->json([
            'status' => 'success',
            'blogdetailsection1' => $blogdetailsection1
        ]);
    }


    public function edit($id)
{
    $blogdetailsection1 = \App\Models\BlogDetailSection1::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'blogdetailsection1' => $blogdetailsection1
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'blogdetailsection1_id' => 'required|exists:blog_detail_section1s,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'slug'     => 'nullable',
    ]);

    $blogdetailsection1 = \App\Models\BlogDetailSection1::findOrFail($request->blogdetailsection1_id);

    $blogdetailsection1->heading   = $request->heading;
    $blogdetailsection1->paragraph = $request->paragraph;
    $blogdetailsection1->slug = $request->slug;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $blogdetailsection1->image = $imageName;
    }


    $blogdetailsection1->save();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection1 updated successfully!',
        'blogdetailsection1' => $blogdetailsection1
    ]);
}

public function destroy($id)
{
    $blogdetailsection1 = \App\Models\BlogDetailSection1::find($id);

    if (!$blogdetailsection1) {
        return response()->json([
            'status' => 'error',
            'message' => 'blogdetailsection1 not found.'
        ], 404);
    }

    if ($blogdetailsection1->image && file_exists(public_path('logos/' . $blogdetailsection1->image))) {
        unlink(public_path('logos/' . $blogdetailsection1->image));
    }
    
    $blogdetailsection1->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'blogdetailsection1 deleted successfully!',
        'id' => $id
    ]);
}

public function detailsblogs($slug)
{
    $decodedSlug = urldecode($slug);

    $blog = BlogSection2::where('heading', $decodedSlug)->get();

    if ($blog->isEmpty()) {
        return abort(404, 'blog not found');
    }

    $blogdetailsection1s = \App\Models\BlogDetailSection1::whereIn('slug', $blog->pluck('links'))->get();
    $sections6s = \App\Models\BlogDetailSection2::whereIn('slug', $blog->pluck('links'))->get();
    $blogdetailsection3s = \App\Models\BlogDetailSection3::whereIn('slug', $blog->pluck('links'))->get();
   
    $services = Section4::all();

    return view('users.blogdetails', compact(
    'blog',
    'blogdetailsection1s',
    'sections6s',
    'services',
    'blogdetailsection3s'
    ));
}


}
