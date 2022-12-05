<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\aboutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
// Admin all route 
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout','destroy')->name('admin.logout');
    Route::get('admin/profile','adminProfile')->name('admin.profile');
    Route::get('admin/edit','adminEdit')->name('admin.edit');
    Route::post('/admin/update','adminUpdate')->name('store.profile');
    Route::get('/profile/changePassword','changePassword')->name('profile.changePassword');
    Route::post('/profile/storePassword','updatePassword')->name('store.chpagePassword');

});
// Home all route 
Route::controller(HomeController::class)->group(function(){
    Route::get('home/slide','HomeSlide')->name('home.slide');
    Route::put('update/home/slide','updateHomeSlide')->name('Update.home_slide');
   

});
// Aboute all route 
Route::controller(aboutController::class)->group(function(){
    Route::get('aboute/page','AboutePage')->name('aboute.page');
    Route::put('aboute/page/update','updatePage')->name('update.abautePage');
    Route::get('about','homeAboute')->name('home.aboute');
    Route::get('about/multi/image','multiImage')->name('aboute.multi.image');
    Route::put('aboute/multiImage/store','storeMultiImage')->name('store.multi.image');


    
   

});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';