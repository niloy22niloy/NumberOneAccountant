<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebViewController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){
    Admin::create([
        'name'=>'Admin',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('password123'),
    ]);
    return "success";
});

Route::get('/home',[WebViewController::class,'home'])->name('home');
Route::get('/pricing',[WebViewController::class,'pricing'])->name('pricing');
Route::get('/about',[WebViewController::class,'about'])->name('about');
Route::get('/contact',[WebViewController::class,'contact'])->name('contact');
Route::get('/legal',[WebViewController::class,'legal'])->name('legal');




Route::get('/test',function(){
    return "hello";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
        Route::post('/hero', [DashboardController::class, 'update'])->name('hero.update');
        Route::get('/about', [DashboardController::class, 'about'])->name('about');
        Route::post('/about_first_section_post', [DashboardController::class, 'about_first_section_post'])->name('about_first_section_post');
        Route::post('/about_second_section_post', [DashboardController::class, 'about_second_section_post'])->name('about_second_section_post');
        Route::post('/about_second_section_card_post', [DashboardController::class, 'about_second_section_card_post'])->name('about_second_section_card_post');
        Route::post('/about_card_update', [DashboardController::class, 'about_card_update'])->name('about_card_update');
        Route::get('/about_card_delete/{id}', [DashboardController::class, 'about_card_delete'])->name('about_card_delete');


    });
});

require __DIR__.'/auth.php';
