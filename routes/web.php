<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PaymentController;
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
Route::get('/resource',[WebViewController::class,'resource'])->name('resource');
Route::get('/contact',[WebViewController::class,'contact'])->name('contact');
Route::get('/legal',[WebViewController::class,'legal'])->name('legal');


//contact-us
Route::post('/contanct_us',[WebViewController::class,'contanct_us'])->name('contanct_us');

Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/charge', [PaymentController::class, 'charge'])->name('charge');






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

        Route::post('/about_third_section_post', [DashboardController::class, 'about_third_section_post'])->name('about_third_section_post');
        Route::post('/about_third_section_card_post', [DashboardController::class, 'about_third_section_card_post'])->name('about_third_section_card_post');
        Route::post('/about_third_section_card_update', [DashboardController::class, 'about_third_section_card_update'])->name('about_third_section_card_update');
        Route::get('/about_third_section_card_delete/{id}', [DashboardController::class, 'about_third_section_card_delete'])->name('about_third_section_card_delete');
         Route::post('/about_last_section_post', [DashboardController::class,
         'about_last_section_post'])->name('about_last_section_post');

         //Contact
        Route::get('/contact', [DashboardController::class,
        'contact'])->name('contact');
         Route::get('/contact_delete/{id}', [DashboardController::class,
         'contact_delete'])->name('contact_delete');

          Route::get('/admin/legal_documentation', [DashboardController::class,
          'admin_legal_documentation'])->name('legal_documentation');
          Route::post('/admin/legal/store', [DashboardController::class, 'legal_store'])->name('legal.store');
          Route::get('/admin/legal/view/{id}', [DashboardController::class, 'view'])->name('legal.view');
          Route::get('/admin/legal/download/{id}', [DashboardController::class,
          'download'])->name('legal.download');
          Route::put('/admin/legal/title/update', [DashboardController::class,
          'legal_update'])->name('legal.title.update');
             Route::get('/resources', [DashboardController::class,
             'resources'])->name('resources');
             Route::post('modules', [DashboardController::class, 'module_store'])->name('modules.store');
             Route::get('modules/show/{id}', [DashboardController::class, 'module_show'])->name('modules.show');
             Route::post('modules/posts/store/{id}', [DashboardController::class,
             'modules_posts_store'])->name('modules.posts.store');
            Route::get('modules/posts/edit/{id}', [DashboardController::class,'modules_posts_edit'])->name('modules.posts.edit');
            Route::put('modules/posts/update/{module_id}/{post_id}', [DashboardController::class,'modules_posts_update'])->name('modules.posts.update');
            Route::delete('modules/posts/destroy/{id}', [DashboardController::class,'modules_posts_destroy'])->name('modules.posts.destroy');


        Route::get('/pricing', [DashboardController::class, 'pricing'])->name('pricing');
        // Route::get('/', [PricingPlanController::class, 'index'])->name('index');
        Route::post('/pricing_store', [DashboardController::class, 'pricing_store'])->name('pricing.store');

        Route::get('/pricing/edit/{id}', [DashboardController::class, 'pricing_edit'])->name('pricing.edit');

        Route::put('pricing/{id}', [DashboardController::class, 'pricing_update'])->name('pricing.update');

        Route::delete('/pricing/destroy/{id}', [DashboardController::class, 'pricing_destroy'])->name('pricing.destroy');


        Route::post('/pricing/activate/{id}', [DashboardController::class, 'pricing_activate'])->name('pricing.activate');
















    });
});

require __DIR__.'/auth.php';
