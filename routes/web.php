<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MenuTagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('index', [FrontendController::class, 'index'])->name('index');
Route::get('desert', [FrontendController::class, 'desert'])->name('desert');
Route::get('commcool', [FrontendController::class, 'commcool'])->name('commcool');
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('video-gallery', [FrontendController::class, 'videoGallery'])->name('video-gallery');
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
Route::get('b2b/registration', [FrontendController::class, 'b2b_registration'])->name('b2b-registration');

//---------------ADMIN---------------//

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('logo', [AdminController::class, 'logo'])->name('logo');
Route::patch('logoUpdate/{id}', [AdminController::class,'logoUpdate'])->name('logoUpdate');

Route::get('slider', [SliderController::class, 'index'])->name('slider');
Route::get('slider-create', [SliderController::class, 'create'])->name('slider-create');
Route::post('slider-store', [SliderController::class, 'store'])->name('slider-store');
Route::get('slider-edit/{id}', [SliderController::class, 'edit'])->name('slider-edit');
Route::patch('slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

Route::get('add-menu', [MenuTagController::class, 'create'])->name('add-menu');
Route::post('add-menu-store', [MenuTagController::class, 'store'])->name('add-menu-store');
Route::get('all-add-menu', [MenuTagController::class, 'index'])->name('all-add-menu');
