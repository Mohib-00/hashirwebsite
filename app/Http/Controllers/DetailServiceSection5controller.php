<?php

namespace App\Http\Controllers;

use App\Models\DetailServiceSection5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailServiceSection5controller extends Controller
{
    public function detailsservicesection5()
    {
        $user = Auth::user();
        $detailservicesection5s = DetailServiceSection5::all();
        $main_heading_count = DetailServiceSection5::whereNotNull('main_heading')->count();
        return view('admin.detailservicesection5',compact('detailservicesection5s','main_heading_count'),[
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

        $detailservicesection5 = new DetailServiceSection5();

        $detailservicesection5->heading = $request->heading;
        $detailservicesection5->paragraph = $request->paragraph;
        $detailservicesection5->slug = $request->slug;
        $detailservicesection5->main_heading = $request->main_heading;
        $detailservicesection5->save();

        return response()->json([
            'status' => 'success',
            'detailservicesection5' => $detailservicesection5
        ]);
    }


    public function edit($id)
{
    $detailservicesection5 = DetailServiceSection5::findOrFail($id);

    return response()->json([
        'status' => 'success',
        'detailservicesection5' => $detailservicesection5
    ]);
}

 public function update(Request $request)
{
    $request->validate([
        'detailservicesection5_id' => 'required|exists:detail_service_section5s,id',
        'heading'   => 'nullable',
        'paragraph' => 'nullable',
        'slug' => 'nullable',
        'main_heading'   => 'nullable',
    ]);

    $detailservicesection5 = DetailServiceSection5::findOrFail($request->detailservicesection5_id);

    $detailservicesection5->heading   = $request->heading;
    $detailservicesection5->paragraph = $request->paragraph;
    $detailservicesection5->slug = $request->slug;
    $detailservicesection5->main_heading = $request->main_heading;

    $detailservicesection5->save();

    return response()->json([
        'status' => 'success',
        'message' => 'detailservicesection5 updated successfully!',
        'detailservicesection5' => $detailservicesection5
    ]);
}

public function destroy($id)
{
    $detailservicesection5 = DetailServiceSection5::find($id);

    if (!$detailservicesection5) {
        return response()->json([
            'status' => 'error',
            'message' => 'detailservicesection5 not found.'
        ], 404);
    }

    if ($detailservicesection5->image && file_exists(public_path('logos/' . $detailservicesection5->image))) {
        unlink(public_path('logos/' . $detailservicesection5->image));
    }
    
    $detailservicesection5->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'detailservicesection5 deleted successfully!',
        'id' => $id
    ]);
}
}
