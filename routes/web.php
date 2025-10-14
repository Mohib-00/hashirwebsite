<?php

use App\Http\Controllers\AboutSection1Controller;
use App\Http\Controllers\AboutSection2Controller;
use App\Http\Controllers\AboutSection3Controller;
use App\Http\Controllers\Aboutsection4controller;
use App\Http\Controllers\AboutSection5Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogDetailSection1Controller;
use App\Http\Controllers\BlogDetailSection2Controller;
use App\Http\Controllers\BlogDetailSection3Controller;
use App\Http\Controllers\BlogDetailSection4Controller;
use App\Http\Controllers\BlogDetailSection5Controller;
use App\Http\Controllers\BlogSection2controller;
use App\Http\Controllers\BlogsSection1Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailServiceSection2controller;
use App\Http\Controllers\DetailServiceSection3controller;
use App\Http\Controllers\DetailServiceSection4controller;
use App\Http\Controllers\DetailServiceSection5controller;
use App\Http\Controllers\Section10Controller;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;
use App\Http\Controllers\Section3Controller;
use App\Http\Controllers\Section4Controller;
use App\Http\Controllers\Section5Controller;
use App\Http\Controllers\Section6Controller;
use App\Http\Controllers\Section7Controller;
use App\Http\Controllers\Section8Controller;
use App\Http\Controllers\Section9Controller;
use App\Http\Controllers\ServicesBannerDetailsController;
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
//to open service detail
Route::get('/service/{slug}/details', [Section4Controller::class, 'detailsservice'])
    ->where('slug', '.*') 
    ->name('service.details');

//to open blogs detail
Route::get('/blogs/{slug}/details', [BlogDetailSection1Controller::class, 'detailsblogs'])
    ->where('slug', '.*') 
    ->name('blogs.details');    

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
    Route::get("section_6", [Section6Controller::class, "section6"]);
    Route::get("section_7", [Section7Controller::class, "section7"]);
    Route::get("section_8", [Section8Controller::class, "section8"]);
    Route::get("section_9", [Section9Controller::class, "section9"]);
    Route::get("section_10", [Section10Controller::class, "section10"]);
    Route::get("website_settings", [SettingsController::class, "websitesettings"]);
    Route::get("details_service_section1", [ServicesBannerDetailsController::class, "detailsservicesection1"]);
    Route::get("details_service_section2", [DetailServiceSection2controller::class, "detailsservicesection2"]);
    Route::get("details_service_section3", [DetailServiceSection3controller::class, "detailsservicesection3"]);
    Route::get("details_service_section4", [DetailServiceSection4controller::class, "detailsservicesection4"]);
    Route::get("details_service_section5", [DetailServiceSection5controller::class, "detailsservicesection5"]);
    //about start
    Route::get("about_section_1", [AboutSection1Controller::class, "aboutsection1"]);
    Route::get("about_section_2", [AboutSection2Controller::class, "aboutsection2"]);
    Route::get("about_section_3", [AboutSection3Controller::class, "aboutsection3"]);
    Route::get("about_section_4", [Aboutsection4controller::class, "aboutsection4"]);
    Route::get("about_section_5", [AboutSection5Controller::class, "aboutsection5"]);
    //blog start
    Route::get("blog_section_1", [BlogsSection1Controller::class, "blogsection1"]);
    Route::get("blog_section_2", [BlogSection2controller::class, "blogsection2"]);
    Route::get("blog_detail_section_1", [BlogDetailSection1Controller::class, "blogdetailsection1"]);
    Route::get("blog_detail_section_2", [BlogDetailSection2Controller::class, "blogdetailsection2"]);
    Route::get("blog_detail_section_3", [BlogDetailSection3Controller::class, "blogdetailsection3"]);
    Route::get("blog_detail_section_4", [BlogDetailSection4Controller::class, "blogdetailsection4"]);
    Route::get("blog_detail_section_5", [BlogDetailSection5Controller::class, "blogdetailsection5"]);
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
//to save section6
Route::post('/section6/store', [Section6Controller::class, 'store'])->name('section6.store');
//to get section6
Route::get('/section6/{id}/edit', [Section6Controller::class, 'edit'])->name('section6.edit');
//to edit section6
Route::post('/section6/update', [Section6Controller::class, 'update'])->name('section6.update');
//to del section6
Route::delete('/section6/{id}', [Section6Controller::class, 'destroy'])->name('section6.destroy');
//to save section7
Route::post('/section7/store', [Section7Controller::class, 'store'])->name('section7.store');
//to get section7
Route::get('/section7/{id}/edit', [Section7Controller::class, 'edit'])->name('section7.edit');
//to edit section7
Route::post('/section7/update', [Section7Controller::class, 'update'])->name('section7.update');
//to del section7
Route::delete('/section7/{id}', [Section7Controller::class, 'destroy'])->name('section7.destroy');
//to save section8
Route::post('/section8/store', [Section8Controller::class, 'store'])->name('section8.store');
//to get section8
Route::get('/section8/{id}/edit', [Section8Controller::class, 'edit'])->name('section8.edit');
//to edit section8
Route::post('/section8/update', [Section8Controller::class, 'update'])->name('section8.update');
//to del section8
Route::delete('/section8/{id}', [Section8Controller::class, 'destroy'])->name('section8.destroy');
//to save section9
Route::post('/section9/store', [Section9Controller::class, 'store'])->name('section9.store');
//to get section9
Route::get('/section9/{id}/edit', [Section9Controller::class, 'edit'])->name('section9.edit');
//to edit section9
Route::post('/section9/update', [Section9Controller::class, 'update'])->name('section9.update');
//to del section9
Route::delete('/section9/{id}', [Section9Controller::class, 'destroy'])->name('section9.destroy');
//to save section10
Route::post('/section10/store', [Section10Controller::class, 'store'])->name('section10.store');
//to get section10
Route::get('/section10/{id}/edit', [Section10Controller::class, 'edit'])->name('section10.edit');
//to edit section10
Route::post('/section10/update', [Section10Controller::class, 'update'])->name('section10.update');
//to del section10
Route::delete('/section10/{id}', [Section10Controller::class, 'destroy'])->name('section10.destroy');
//to save setting
Route::post('/setting/store', [SettingsController::class, 'store'])->name('setting.store');
//to get setting
Route::get('/setting/{id}/edit', [SettingsController::class, 'edit'])->name('setting.edit');
//to edit setting
Route::post('/setting/update', [SettingsController::class, 'update'])->name('setting.update');
//to del setting
Route::delete('/setting/{id}', [SettingsController::class, 'destroy'])->name('setting.destroy');
//to save detailsservicesection1
Route::post('/detailsservicesection1/store', [ServicesBannerDetailsController::class, 'store'])->name('detailsservicesection1.store');
//to get detailsservicesection1
Route::get('/detailsservicesection1/{id}/edit', [ServicesBannerDetailsController::class, 'edit'])->name('detailsservicesection1.edit');
//to edit detailsservicesection1
Route::post('/detailsservicesection1/update', [ServicesBannerDetailsController::class, 'update'])->name('detailsservicesection1.update');
//to del detailsservicesection1
Route::delete('/detailsservicesection1/{id}', [ServicesBannerDetailsController::class, 'destroy'])->name('detailsservicesection1.destroy');
//to save detailsservicesection2
Route::post('/detailsservicesection2/store', [DetailServiceSection2controller::class, 'store'])->name('detailsservicesection2.store');
//to get detailsservicesection2
Route::get('/detailsservicesection2/{id}/edit', [DetailServiceSection2controller::class, 'edit'])->name('detailsservicesection2.edit');
//to edit detailsservicesection2
Route::post('/detailsservicesection2/update', [DetailServiceSection2controller::class, 'update'])->name('detailsservicesection2.update');
//to del detailsservicesection2
Route::delete('/detailsservicesection2/{id}', [DetailServiceSection2controller::class, 'destroy'])->name('detailsservicesection2.destroy');
//to save detailsservicesection3
Route::post('/detailsservicesection3/store', [DetailServiceSection3controller::class, 'store'])->name('detailsservicesection3.store');
//to get detailsservicesection3
Route::get('/detailsservicesection3/{id}/edit', [DetailServiceSection3controller::class, 'edit'])->name('detailsservicesection3.edit');
//to edit detailsservicesection3
Route::post('/detailsservicesection3/update', [DetailServiceSection3controller::class, 'update'])->name('detailsservicesection3.update');
//to del detailsservicesection3
Route::delete('/detailsservicesection3/{id}', [DetailServiceSection3controller::class, 'destroy'])->name('detailsservicesection3.destroy');
//to save detailsservicesection4
Route::post('/detailsservicesection4/store', [DetailServiceSection4controller::class, 'store'])->name('detailsservicesection4.store');
//to get detailsservicesection4
Route::get('/detailsservicesection4/{id}/edit', [DetailServiceSection4controller::class, 'edit'])->name('detailsservicesection4.edit');
//to edit detailsservicesection4
Route::post('/detailsservicesection4/update', [DetailServiceSection4controller::class, 'update'])->name('detailsservicesection4.update');
//to del detailsservicesection4
Route::delete('/detailsservicesection4/{id}', [DetailServiceSection4controller::class, 'destroy'])->name('detailsservicesection4.destroy');
//to save detailsservicesection5
Route::post('/detailsservicesection5/store', [DetailServiceSection5controller::class, 'store'])->name('detailsservicesection5.store');
//to get detailsservicesection5
Route::get('/detailsservicesection5/{id}/edit', [DetailServiceSection5controller::class, 'edit'])->name('detailsservicesection5.edit');
//to edit detailsservicesection5
Route::post('/detailsservicesection5/update', [DetailServiceSection5controller::class, 'update'])->name('detailsservicesection5.update');
//to del detailsservicesection5
Route::delete('/detailsservicesection5/{id}', [DetailServiceSection5controller::class, 'destroy'])->name('detailsservicesection5.destroy');

//About start

//to save aboutsection1
Route::post('/aboutsection1/store', [AboutSection1Controller::class, 'store'])->name('aboutsection1.store');
//to get aboutsection1
Route::get('/aboutsection1/{id}/edit', [AboutSection1Controller::class, 'edit'])->name('aboutsection1.edit');
//to edit aboutsection1
Route::post('/aboutsection1/update', [AboutSection1Controller::class, 'update'])->name('aboutsection1.update');
//to del aboutsection1
Route::delete('/aboutsection1/{id}', [AboutSection1Controller::class, 'destroy'])->name('aboutsection1.destroy');
//to save aboutsection2
Route::post('/aboutsection2/store', [AboutSection2Controller::class, 'store'])->name('aboutsection2.store');
//to get aboutsection2
Route::get('/aboutsection2/{id}/edit', [AboutSection2Controller::class, 'edit'])->name('aboutsection2.edit');
//to edit aboutsection2
Route::post('/aboutsection2/update', [AboutSection2Controller::class, 'update'])->name('aboutsection2.update');
//to del aboutsection2
Route::delete('/aboutsection2/{id}', [AboutSection2Controller::class, 'destroy'])->name('aboutsection2.destroy');
//to save aboutsection3
Route::post('/aboutsection3/store', [AboutSection3Controller::class, 'store'])->name('aboutsection3.store');
//to get aboutsection3
Route::get('/aboutsection3/{id}/edit', [AboutSection3Controller::class, 'edit'])->name('aboutsection3.edit');
//to edit aboutsection3
Route::post('/aboutsection3/update', [AboutSection3Controller::class, 'update'])->name('aboutsection3.update');
//to del aboutsection3
Route::delete('/aboutsection3/{id}', [AboutSection3Controller::class, 'destroy'])->name('aboutsection3.destroy');
//to save aboutsection4
Route::post('/aboutsection4/store', [AboutSection4Controller::class, 'store'])->name('aboutsection4.store');
//to get aboutsection4
Route::get('/aboutsection4/{id}/edit', [AboutSection4Controller::class, 'edit'])->name('aboutsection4.edit');
//to edit aboutsection4
Route::post('/aboutsection4/update', [AboutSection4Controller::class, 'update'])->name('aboutsection4.update');
//to del aboutsection4
Route::delete('/aboutsection4/{id}', [AboutSection4Controller::class, 'destroy'])->name('aboutsection4.destroy');
//to save aboutsection5
Route::post('/aboutsection5/store', [AboutSection5Controller::class, 'store'])->name('aboutsection5.store');
//to get aboutsection5
Route::get('/aboutsection5/{id}/edit', [AboutSection5Controller::class, 'edit'])->name('aboutsection5.edit');
//to edit aboutsection5
Route::post('/aboutsection5/update', [AboutSection5Controller::class, 'update'])->name('aboutsection5.update');
//to del aboutsection5
Route::delete('/aboutsection5/{id}', [AboutSection5Controller::class, 'destroy'])->name('aboutsection5.destroy');
//About end

//to send message
Route::post('/submit-contact', [ContactController::class, 'store'])->name('contact.store');

//Blog Start
//to save blogsection1
Route::post('/blogsection1/store', [BlogsSection1Controller::class, 'store'])->name('blogsection1.store');
//to get blogsection1
Route::get('/blogsection1/{id}/edit', [BlogsSection1Controller::class, 'edit'])->name('blogsection1.edit');
//to edit blogsection1
Route::post('/blogsection1/update', [BlogsSection1Controller::class, 'update'])->name('blogsection1.update');
//to del blogsection1
Route::delete('/blogsection1/{id}', [BlogsSection1Controller::class, 'destroy'])->name('blogsection1.destroy');
//to save blogsection2
Route::post('/blogsection2/store', [BlogSection2Controller::class, 'store'])->name('blogsection2.store');
//to get blogsection2
Route::get('/blogsection2/{id}/edit', [BlogSection2Controller::class, 'edit'])->name('blogsection2.edit');
//to edit blogsection2
Route::post('/blogsection2/update', [BlogSection2Controller::class, 'update'])->name('blogsection2.update');
//to del blogsection2
Route::delete('/blogsection2/{id}', [BlogSection2Controller::class, 'destroy'])->name('blogsection2.destroy');
//to save blogdetailsection1
Route::post('/blogdetailsection1/store', [BlogDetailSection1Controller::class, 'store'])->name('blogdetailsection1.store');
//to get blogdetailsection1
Route::get('/blogdetailsection1/{id}/edit', [BlogDetailSection1Controller::class, 'edit'])->name('blogdetailsection1.edit');
//to edit blogdetailsection1
Route::post('/blogdetailsection1/update', [BlogDetailSection1Controller::class, 'update'])->name('blogdetailsection1.update');
//to del blogdetailsection1
Route::delete('/blogdetailsection1/{id}', [BlogDetailSection1Controller::class, 'destroy'])->name('blogdetailsection1.destroy');
//to save blogdetailsection2
Route::post('/blogdetailsection2/store', [BlogDetailSection2Controller::class, 'store'])->name('blogdetailsection2.store');
//to get blogdetailsection2
Route::get('/blogdetailsection2/{id}/edit', [BlogDetailSection2Controller::class, 'edit'])->name('blogdetailsection2.edit');
//to edit blogdetailsection2
Route::post('/blogdetailsection2/update', [BlogDetailSection2Controller::class, 'update'])->name('blogdetailsection2.update');
//to del blogdetailsection2
Route::delete('/blogdetailsection2/{id}', [BlogDetailSection2Controller::class, 'destroy'])->name('blogdetailsection2.destroy');
//to save blogdetailsection3
Route::post('/blogdetailsection3/store', [BlogDetailSection3Controller::class, 'store'])->name('blogdetailsection3.store');
//to get blogdetailsection3
Route::get('/blogdetailsection3/{id}/edit', [BlogDetailSection3Controller::class, 'edit'])->name('blogdetailsection3.edit');
//to edit blogdetailsection3
Route::post('/blogdetailsection3/update', [BlogDetailSection3Controller::class, 'update'])->name('blogdetailsection3.update');
//to del blogdetailsection3
Route::delete('/blogdetailsection3/{id}', [BlogDetailSection3Controller::class, 'destroy'])->name('blogdetailsection3.destroy');
//to save blogdetailsection4
Route::post('/blogdetailsection4/store', [BlogDetailSection4Controller::class, 'store'])->name('blogdetailsection4.store');
//to get blogdetailsection4
Route::get('/blogdetailsection4/{id}/edit', [BlogDetailSection4Controller::class, 'edit'])->name('blogdetailsection4.edit');
//to edit blogdetailsection4
Route::post('/blogdetailsection4/update', [BlogDetailSection4Controller::class, 'update'])->name('blogdetailsection4.update');
//to del blogdetailsection4
Route::delete('/blogdetailsection4/{id}', [BlogDetailSection4Controller::class, 'destroy'])->name('blogdetailsection4.destroy');
//to save blogdetailsection5
Route::post('/blogdetailsection5/store', [BlogDetailSection5Controller::class, 'store'])->name('blogdetailsection5.store');
//to get blogdetailsection5
Route::get('/blogdetailsection5/{id}/edit', [BlogDetailSection5Controller::class, 'edit'])->name('blogdetailsection5.edit');
//to edit blogdetailsection5
Route::post('/blogdetailsection5/update', [BlogDetailSection5Controller::class, 'update'])->name('blogdetailsection5.update');
//to del blogdetailsection5
Route::delete('/blogdetailsection5/{id}', [BlogDetailSection5Controller::class, 'destroy'])->name('blogdetailsection5.destroy');