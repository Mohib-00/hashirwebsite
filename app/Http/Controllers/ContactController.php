<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
     public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'required|string|max:20',
        'message' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'validation_error',
            'errors' => $validator->errors()
        ], 422);
    }

    Contact::create($request->only(['name', 'email', 'phone', 'message']));

    return response()->json([
        'status'  => 'success',
        'message' => 'Thank you for contacting us! Our team has received your message and will get back to you shortly.'
    ]);
}

}
