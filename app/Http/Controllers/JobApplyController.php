<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApply;
use Illuminate\Support\Facades\Auth;

class JobApplyController extends Controller
{
     public function store(Request $request)
    {
        $validated = $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'job_title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($request->hasFile('cv')) {
            $fileName = time() . '.' . $request->cv->getClientOriginalExtension();
            $request->cv->move(public_path('uploads/cv'), $fileName);
            $validated['cv'] = $fileName;
        }

        JobApply::create($validated);

        return response()->json(['success' => true, 'message' => 'Your application has been submitted successfully!']);
    }

    public function jobapplications()
    {
        $user = Auth::user();
        $jobs = JobApply::all();
        return view('admin.jobapplications',compact('jobs'),[
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

  public function markAsReadjobapply(Request $request)
{
    $contact = JobApply::find($request->id);

    if ($contact) {
        $contact->status = 'complete';
        $contact->save();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}
}
