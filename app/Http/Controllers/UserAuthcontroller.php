<?php

namespace App\Http\Controllers;

use App\Models\Section1;
use App\Models\Section2;
use App\Models\Section3;
use App\Models\Section4;
use App\Models\Section5;
use App\Models\Section6;
use App\Models\Section7;
use App\Models\Section8;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{

    public function userspage()
{
    $sections = Section1::all();
    $section2s = Section2::all();
    $section3s = Section3::all(); 
    $services = Section4::all();
    $section5s = Section5::all();
    $sections6s = Section6::all();
    $sections7s = Section7::all();
    $sections8s = Section8::all();
    return view('users.userpages', compact('sections','section2s','section3s','services','section5s','sections6s','sections7s','sections8s'));
}

     public function aboutus()
    {
         $sections = Section1::all();
        return view('users.aboutus', compact('sections'));
    }

     public function career()
    {
        return view('users.careers');
    }

     public function blog()
    {
        return view('users.blogs');
    }

     public function contact()
    {
        return view('users.contactus');
    }
    public function loginn()
    {
        return view('login');
    }

    public function registerr()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'The credentials do not match our records.',
                'errors' => [
                    'password' => ['The password you entered is incorrect.'],
                ],
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'userType' => $user->userType ?? null,
        ], 200);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete();
        }
        Session::flush();

        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => [],
        ], 200);
    }

    public function users()
    {
        $user = Auth::user();
        $users = User::all();
        return view('admin.users', compact('users') + [
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function addUser()
    {
        $user = Auth::user();
        return view('admin.adduser', [
            'userName' => $user->name,
            'userEmail' => $user->email,
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'message' => 'Password changed successfully',
            'status' => 'Success',
        ], 200);
    }

    public function editUserPage($id)
    {
        $user = Auth::user();
        $editUser = User::findOrFail($id);
        return view('admin.edituser', [
            'userName' => $user->name,
            'userEmail' => $user->email,
            'users' => $editUser,
        ]);
    }



    public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    if ($request->filled('name')) {
        $user->name = $request->input('name');
    }

    if ($request->filled('email')) {
        $user->email = $request->input('email');
    }

    if ($request->filled('role')) {
        $user->role = $request->input('role');
    }

    if ($request->filled('gender')) {
        $user->gender = $request->input('gender');
    }

    if ($request->filled('dashboard')) {
        $user->dashboard = $request->input('dashboard');
    }

    if ($request->filled('discount')) {
        $user->discount = $request->input('discount');
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $user->image = 'images/' . $imageName;
    }

    $user->save();

    return response()->json(['status' => 'success', 'message' => 'User updated successfully.']);
}


    public function changePasswordofuser(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully'
        ]);
    }

}
