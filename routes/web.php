<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
    });
});

require __DIR__.'/auth.php';
