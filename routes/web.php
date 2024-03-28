<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
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
        Route::post('/category/status/{id}', 'status')->name('category.status');
        Route::get('/category/destroy/{id}', 'destroy')->name('category.destroy');
        // Route::get('/categories/all', 'categoryAll')->name('categories.all');
    });
    // subcategory related route(n)
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory', 'index')->name('subcategory');
        Route::post('/subcategory/store', 'store')->name('subcategory.store');
        Route::get('/subcategory/view', 'view')->name('subcategory.view');
        Route::get('/subcategory/edit/{id}', 'edit')->name('subcategory.edit');
        Route::post('/subcategory/update/{id}', 'update')->name('subcategory.update');
        Route::get('/subcategory/destroy/{id}', 'destroy')->name('subcategory.destroy');
    });
    // Branch related route(n)
    Route::controller(BranchController::class)->group(function () {
        Route::get('/branch', 'index')->name('branch');
        Route::post('/branch/store', 'store')->name('branch.store');
        Route::get('/branch/view', 'BranchView')->name('branch.view');
        Route::get('/branch/edit/{id}', 'BranchEdit')->name('branch.edit');
        Route::post('/branch/update/{id}', 'BranchUpdate')->name('branch.update');
        Route::get('/branch/delete/{id}', 'BranchDelete')->name('branch.delete');
    });
    // Customer related route(n)
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer/add', 'AddCustomer')->name('customer.add');
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');
        Route::get('/customer/view', 'CustomerView')->name('customer.view');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update/{id}', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
    });
    // Unit related route 
    Route::controller(UnitController::class)->group(function () {
        Route::get('/unit', 'index')->name('unit');
        Route::post('/unit/store', 'store')->name('unit.store');
        Route::get('/unit/view', 'view')->name('unit.view');
        Route::get('/unit/edit/{id}', 'edit')->name('unit.edit');
        Route::post('/unit/update/{id}', 'update')->name('unit.update');
        Route::get('/unit/destroy/{id}', 'destroy')->name('unit.destroy');
        // Route::get('/categories/all', 'categoryAll')->name('categories.all');
    });
});

require __DIR__ . '/auth.php';
