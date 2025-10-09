<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;
use App\Http\Controllers\Section3Controller;
use App\Http\Controllers\Section4Controller;
use App\Http\Controllers\Section5Controller;
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
//to open about us page
Route::get("/about-us", [UserAuthcontroller::class, "aboutus"]);
//to open careers us page
Route::get("/careers", [UserAuthcontroller::class, "career"]);
//to open blogs us page
Route::get("/blogs", [UserAuthcontroller::class, "blog"]);
//to open contact us page
Route::get("/contact-us", [UserAuthcontroller::class, "contact"]);

Route::group(['middleware' => ['admin.auth'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get("users", [UserAuthcontroller::class, "users"]);
    Route::get("add_user", [UserAuthcontroller::class, "adduser"]);
    Route::get("admin_profile", [SettingsController::class, "adminprofile"]);
    Route::get('edit_user/{id}', [UserAuthcontroller::class, 'edituserpage']);
    Route::get("section_1", [Section1Controller::class, "section1"]);
    Route::get("section_2", [Section2Controller::class, "section2"]);
    Route::get("section_3", [Section3Controller::class, "section3"]);
    Route::get("section_4", [Section4Controller::class, "section4"]);
    Route::get("section_5", [Section5Controller::class, "section5"]);
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
//to save banner
Route::post('/banners/store', [Section1Controller::class, 'store'])->name('banners.store');
//to get banner
Route::get('/banners/{id}/edit', [Section1Controller::class, 'edit'])->name('banners.edit');
//to edit banner
Route::post('/banners/update', [Section1Controller::class, 'update'])->name('banners.update');
//to del banner
Route::delete('/banners/{id}', [Section1Controller::class, 'destroy'])->name('banners.destroy');
//to save sliders
Route::post('/sliders/store', [Section2Controller::class, 'store'])->name('sliders.store');
//to get sliders
Route::get('/sliders/{id}/edit', [Section2Controller::class, 'edit'])->name('sliders.edit');
//to edit sliders
Route::post('/sliders/update', [Section2Controller::class, 'update'])->name('sliders.update');
//to del sliders
Route::delete('/sliders/{id}', [Section2Controller::class, 'destroy'])->name('sliders.destroy');
//to save section3
Route::post('/section3/store', [Section3Controller::class, 'store'])->name('section3.store');
//to get section3
Route::get('/section3/{id}/edit', [Section3Controller::class, 'edit'])->name('section3.edit');
//to edit section3
Route::post('/section3/update', [Section3Controller::class, 'update'])->name('section3.update');
//to del section3
Route::delete('/section3/{id}', [Section3Controller::class, 'destroy'])->name('section3.destroy');
//to save section4
Route::post('/section4/store', [Section4Controller::class, 'store'])->name('section4.store');
//to get section4
Route::get('/section4/{id}/edit', [Section4Controller::class, 'edit'])->name('section4.edit');
//to edit section4
Route::post('/section4/update', [Section4Controller::class, 'update'])->name('section4.update');
//to del section4
Route::delete('/section4/{id}', [Section4Controller::class, 'destroy'])->name('section4.destroy');
//to save Section5
Route::post('/section5/store', [Section5Controller::class, 'store'])->name('section5.store');
//to get section5
Route::get('/section5/{id}/edit', [Section5Controller::class, 'edit'])->name('section5.edit');
//to edit section5
Route::post('/section5/update', [Section5Controller::class, 'update'])->name('section5.update');
//to del section5
Route::delete('/section5/{id}', [Section5Controller::class, 'destroy'])->name('section5.destroy');