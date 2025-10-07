<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserAuthcontroller;
use Illuminate\Support\Facades\Route;


//to open users front  page
Route::get("/", [UserAuthcontroller::class, "userspage"]);

//register
Route::post("registerrr",[UserAuthcontroller::class,"register"]);

//Login
Route::post("login",[UserAuthcontroller::class,"login"])->name('login');

//Logout
Route::post("logout",[UserAuthcontroller::class,"logout"]);

//to open login page
Route::get("/login", [UserAuthcontroller::class, "loginn"]);

//to open register page
//Route::get("/register", [UserAuthcontroller::class, "registerr"]);

//to open forgot password page
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');

//to send reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

//to open reset password page
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

//to reset password
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');

Route::group(['middleware' => ['admin.auth'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get("users", [UserAuthcontroller::class, "users"]);
    Route::get("add_user", [UserAuthcontroller::class, "adduser"]);
    Route::get("admin_profile", [SettingsController::class, "adminprofile"]);
    Route::get('edit_user/{id}', [UserAuthcontroller::class, 'edituserpage']);
});

//register user from admin panel
Route::post("register-user",[UserAuthcontroller::class,"register"]);
//to update profile
Route::post('/update-profile', [SettingsController::class, 'updateProfile'])->name('update.profile');
//to change password
Route::post("changePassword",[UserAuthcontroller::class,"changePassword"]);
//to edit user 
Route::post('/user/update/{id}', [UserAuthcontroller::class, 'updateUser'])->name('user.update');
//to chnge user password
Route::post('/admin/change-password/{id}', [UserAuthController::class, 'changePasswordofuser'])->name('admin.change-password');