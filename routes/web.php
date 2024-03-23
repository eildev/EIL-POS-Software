<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Profile Route
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // category related route 
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/view', 'view')->name('category.view');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update/{id}', 'update')->name('category.update');
        Route::get('/category/destroy/{id}', 'destroy')->name('category.destroy');
    });
});

require __DIR__ . '/auth.php';
