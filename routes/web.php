<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductsSizeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
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
        Route::post('/subcategory/status/{id}', 'status')->name('subcategory.status');
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
    });

    // Product Size related route(n)
    Route::controller(ProductsSizeController::class)->group(function () {
        Route::get('/product/size/add', 'ProductSizeAdd')->name('product.size.add');
        Route::post('/product/size/store', 'ProductSizeStore')->name('product.size.store');
        Route::get('/product/size/view', 'ProductSizeView')->name('product.size.view');
        Route::get('/product/size/edit/{id}', 'ProductSizeEdit')->name('product.size.edit');
        Route::post('/product/size/update/{id}', 'ProductSizeUpdate')->name('product.size.update');
        Route::get('/product/size/delete/{id}', 'ProductSizeDelete')->name('product.size.delete');
    });

    // Product  related route(n)
    Route::controller(ProductsController::class)->group(function () {
        Route::get('/product/add', 'ProducAdd')->name('product.add');
        Route::post('/product/store', 'ProducStore')->name('product.store');
        Route::get('/product/view', 'ProducView')->name('product.view');
        Route::get('/product/edit/{id}', 'ProducEdit')->name('product.edit');
        Route::post('/product/update/{id}', 'ProducUpdate')->name('product.update');
    });

    // Product  related route(n)
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee/add', 'EmployeeAdd')->name('employee.add');
        Route::post('/employee/store', 'EmployeeStore')->name('employee.store');
        Route::get('/employee/view', 'EmployeeView')->name('employee.view');
        Route::get('/employee/edit/{id}', 'EmployeeEdit')->name('employee.edit');
        Route::post('/employee/update/{id}', 'EmployeeUpdate')->name('employee.update');
        Route::get('/employee/delete/{id}', 'EmployeeDelete')->name('employee.delete');
    });

    // Banks related route 
    Route::controller(BankController::class)->group(function () {
        Route::get('/bank', 'index')->name('bank');
        Route::post('/bank/store', 'store')->name('bank.store');
        Route::get('/bank/view', 'view')->name('bank.view');
        Route::get('/bank/edit/{id}', 'edit')->name('bank.edit');
        Route::post('/bank/update/{id}', 'update')->name('bank.update');
        Route::get('/bank/destroy/{id}', 'destroy')->name('bank.destroy');
    });

    // Supplier related route 
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'index')->name('supplier');
        Route::post('/supplier/store', 'store')->name('supplier.store');
        Route::get('/supplier/view', 'view')->name('supplier.view');
        Route::get('/supplier/edit/{id}', 'edit')->name('supplier.edit');
        Route::post('/supplier/update/{id}', 'update')->name('supplier.update');
        Route::get('/supplier/destroy/{id}', 'destroy')->name('supplier.destroy');
    });

    // Purchase related route 
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'index')->name('purchase');
        Route::post('/purchase/store', 'store')->name('purchase.store');
        Route::get('/purchase/view', 'view')->name('purchase.view');
        Route::get('/purchase/edit/{id}', 'edit')->name('purchase.edit');
        Route::post('/purchase/update/{id}', 'update')->name('purchase.update');
        Route::get('/purchase/destroy/{id}', 'destroy')->name('purchase.destroy');
    });
});

require __DIR__ . '/auth.php';
