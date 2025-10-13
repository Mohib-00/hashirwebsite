<?php

namespace App\Http\Controllers;

use App\Models\DetailServiceSection3;
use App\Models\DetialServiceSection2;
use App\Models\Section4;
use App\Models\ServicesDetailsSection1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Section4Controller extends Controller
{
    public function section4()
    {
        $user = Auth::user();
        $section4s = Section4::all();
        return view('admin.section4',compact('section4s'),[
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
            'links' => 'nullable',
        ]);

        $section4 = new Section4();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('logos'), $imageName);
            $section4->image = $imageName;
        }

        $section4->heading = $request->heading;
        $section4->paragraph = $request->paragraph;
        $section4->links = $request->links;
        $section4->save();

        return response()->json([
            'status' => 'success',
            'section4' => $section4
        ]);
    }


    public function edit($id)
{
    $section4 = Section4::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'section4' => $section4
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'section4_id' => 'required|exists:section4,id',
        'heading'   => 'required',
        'paragraph' => 'nullable',
        'image'     => 'nullable',
        'links'     => 'nullable',
    ]);

    $section4 = Section4::findOrFail($request->section4_id);

    $section4->heading   = $request->heading;
    $section4->paragraph = $request->paragraph;
    $section4->links = $request->links;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('logos'), $imageName);
        $section4->image = $imageName;
    }


    $section4->save();

    return response()->json([
        'status' => 'success',
        'message' => 'section4 updated successfully!',
        'section4' => $section4
    ]);
}

public function destroy($id)
{
    $section4 = Section4::find($id);

    if (!$section4) {
        return response()->json([
            'status' => 'error',
            'message' => 'section4 not found.'
        ], 404);
    }

    if ($section4->image && file_exists(public_path('logos/' . $section4->image))) {
        unlink(public_path('logos/' . $section4->image));
    }
    
    $section4->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'section4 deleted successfully!',
        'id' => $id
    ]);
}

public function detailsservice($slug)
    {
        $user = Auth::check() ? Auth::user() : null;
        $service = Section4::whereRaw("LOWER(REPLACE(heading, ' ', '-')) = ?", [strtolower($slug)])->get();
        if ($service->isEmpty()) {
            return abort(404, 'service not found');
        }
        $servicedetailsection1s = ServicesDetailsSection1::whereIn('slug', $service->pluck('links'))->get();
        $sections6s = DetialServiceSection2::whereIn('slug', $service->pluck('links'))->get();
        $servicedetailsection3s = DetailServiceSection3::whereIn('slug', $service->pluck('links'))->get();
        
        return view('users.servicedetails', compact('service', 'servicedetailsection1s','sections6s','servicedetailsection3s'));
    }
}
