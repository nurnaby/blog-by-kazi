<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
// Admin all route 
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/logout','destroy')->name('admin.logout');
    Route::get('admin/profile','adminProfile')->name('admin.profile');
    Route::get('admin/edit','adminEdit')->name('admin.edit');
    Route::post('/admin/update','adminUpdate')->name('store.profile');
    Route::get('/profile/changePassword','changePassword')->name('profile.changePassword');
    Route::post('/profile/storePassword','storePassword')->name('store.chpagePassword');

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