<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductsSizeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PosSettingsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\CustomeMailControler;
use App\Http\Controllers\RolePermissionController;
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
        Route::get('/subcategory/find/{id}', 'find')->name('subcategory.find');
    });

    // Brand related route
    Route::controller(BrandController::class)->group(function () {
        Route::get('/brand', 'index')->name('brand');
        Route::post('/brand/store', 'store')->name('brand.store');
        Route::get('/brand/view', 'view')->name('brand.view');
        Route::get('/brand/edit/{id}', 'edit')->name('brand.edit');
        Route::post('/brand/update/{id}', 'update')->name('brand.update');
        Route::post('/brand/status/{id}', 'status')->name('brand.status');
        Route::get('/brand/destroy/{id}', 'destroy')->name('brand.destroy');
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
        Route::get('/product', 'index')->name('product');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/view', 'view')->name('product.view');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update/{id}', 'update')->name('product.update');
        Route::get('/product/destroy/{id}', 'destroy')->name('product.destroy');
        Route::get('/product/find/{id}', 'find')->name('product.find');
        Route::get('/product/barcode/{id}', 'ProductBarcode')->name('product.barcode');
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
    // Expense related route(n)
    Route::controller(ExpenseController::class)->group(function () {
        //Expense category route(n)
        Route::post('/expense/category/store', 'ExpenseCategoryStore')->name('expense.category.store');
        Route::get('/expense/category/delete/{id}', 'ExpenseCategoryDelete')->name('expense.category.delete');
        Route::get('/expense/category/edit/{id}', 'ExpenseCategoryEdit')->name('expense.category.edit');
        Route::post('/expense/category/update/{id}', 'ExpenseCategoryUpdate')->name('expense.category.update');
        //Expense route
        Route::get('/expense/add', 'ExpenseAdd')->name('expense.add');
        Route::post('/expense/store', 'ExpenseStore')->name('expense.store');
        Route::get('/expense/view', 'ExpenseView')->name('expense.view');
        Route::get('/expense/edit/{id}', 'ExpenseEdit')->name('expense.edit');
        Route::post('/expense/update/{id}', 'ExpenseUpdate')->name('expense.update');
        Route::get('/expense/delete/{id}', 'ExpenseDelete')->name('expense.delete');
        ///expense Filter route//
        Route::get('/expense/filter/rander', 'ExpenseFilterView')->name('expense.filter.view');
    });

    // Purchase related route
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase', 'index')->name('purchase');
        Route::post('/purchase/store', 'store')->name('purchase.store');
        Route::get('/purchase/view', 'view')->name('purchase.view');
        Route::get('/purchase/view-all', 'viewAll')->name('purchase.view.all');
        Route::get('/purchase/supplier/{id}', 'supplierName')->name('purchase.supplier.name');
        Route::get('/purchase/item/{id}', 'purchaseItem')->name('purchase.item');
        Route::get('/purchase/product/{id}', 'productName')->name('purchase.product.name');
        Route::get('/purchase/view/{id}', 'viewDetails')->name('purchase.view.details');
        Route::get('/purchase/edit/{id}', 'edit')->name('purchase.edit');
        Route::post('/purchase/update/{id}', 'update')->name('purchase.update');
        Route::get('/purchase/destroy/{id}', 'destroy')->name('purchase.destroy');
        Route::get('/purchase/invoice/{id}', 'invoice')->name('purchase.invoice');
        Route::get('/purchase/filter', 'filter')->name('purchase.filter');
        Route::post('/transaction/edit-amount/{id}', 'editTransaction')->name('purchase.edit.transaction');
        Route::get('/purchase/find/{id}', 'find')->name('purchase.find');
    });
    // damage related route
    Route::controller(DamageController::class)->group(function () {
        Route::get('/damage', 'index')->name('damage');
        Route::post('/damage/store', 'store')->name('damage.store');
        Route::get('/damage/view', 'view')->name('damage.view');
        Route::get('/damage/show_quantity/{id}', 'ShowQuantity')->name('damage.show.quantity');
        Route::get('/damage/edit/{id}', 'edit')->name('damage.edit');
        // Route::post('/damage/update/{id}', 'update')->name('damage.update');
        // Route::get('/damage/destroy/{id}', 'destroy')->name('damage.destroy');
        // Route::get('/damage/invoice/{id}', 'invoice')->name('damage.invoice');
    });
    // Promotion  related route(n)
    Route::controller(PromotionController::class)->group(function () {
        Route::get('/promotion/add', 'PromotionAdd')->name('promotion.add');
        Route::post('/promotion/store', 'PromotionStore')->name('promotion.store');
        Route::get('/promotion/view', 'PromotionView')->name('promotion.view');
        Route::get('/promotion/edit/{id}', 'PromotionEdit')->name('promotion.edit');
        Route::post('/promotion/update/{id}', 'PromotionUpdate')->name('promotion.update');
        Route::get('/promotion/delete/{id}', 'PromotionDelete')->name('promotion.delete');
        Route::get('/promotion/find/{id}', 'find')->name('promotion.find');
    });
    // Promotion Details related route(n)
    Route::controller(PromotionController::class)->group(function () {
        Route::get('/promotion/details/add', 'PromotionDetailsAdd')->name('promotion.details.add');
        Route::post('/promotion/details/store', 'PromotionDetailsStore')->name('promotion.details.store');
        Route::get('/promotion/details/view', 'PromotionDetailsView')->name('promotion.details.view');
        Route::get('/promotion/details/edit/{id}', 'PromotionDetailsEdit')->name('promotion.details.edit');
        Route::post('/promotion/details/update/{id}', 'PromotionDetailsUpdate')->name('promotion.details.update');
        Route::get('/promotion/details/delete/{id}', 'PromotionDetailsDelete')->name('promotion.details.delete');
        Route::get('/promotion/product', 'allProduct')->name('promotion.product');
        Route::get('/promotion/customers', 'allCustomers')->name('promotion.customers');
        Route::get('/promotion/branch', 'allBranch')->name('promotion.branch');
        Route::get('/promotion/details/find', 'PromotionDetailsFind')->name('promotion.details.find');
    });
    // Tax related route(n)
    Route::controller(TaxController::class)->group(function () {
        Route::get('/tax/add', 'TaxAdd')->name('tax.add');
        Route::post('/tax/store', 'TaxStore')->name('tax.store');
        Route::get('/tax/view', 'TaxView')->name('tax.view');
        Route::get('/tax/edit/{id}', 'TaxEdit')->name('tax.edit');
        Route::post('/tax/update/{id}', 'TaxUpdate')->name('tax.update');
        Route::get('/tax/delete/{id}', 'TaxDelete')->name('tax.delete');
    });
    // Payment Method related route(n)
    Route::controller(PaymentMethodController::class)->group(function () {
        Route::get('/payment/method/add', 'PaymentMethodAdd')->name('payment.method.add');
        Route::post('/payment/method/store', 'PaymentMethodStore')->name('payment.method.store');
        Route::get('/payment/method/view', 'PaymentMethodView')->name('payment.method.view');
        Route::get('/payment/method/edit/{id}', 'PaymentMethodEdit')->name('payment.method.edit');
        Route::post('/payment/method/update/{id}', 'PaymentMethodUpdate')->name('payment.method.update');
        Route::get('/payment/method/delete/{id}', 'PaymentMethodDelete')->name('payment.method.delete');
    });
    // Transaction related route(n)
    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transaction/add', 'TransactionAdd')->name('transaction.add');
        Route::post('/transaction/store', 'TransactionStore')->name('transaction.store');
        // Route::get('/transaction/view', 'TransactionView')->name('transaction.view');
        // Route::get('/transaction/edit/{id}', 'TransactionEdit')->name('transaction.edit');
        Route::post('/transaction/update/{id}', 'TransactionUpdate')->name('transaction.update');
        Route::get('/transaction/delete/{id}', 'TransactionDelete')->name('transaction.delete');
        Route::get('/getDataForAccountId', 'getDataForAccountId');
        /////Filer Transaction////
        Route::get('/transaction/filter/rander', 'TransactionFilterView')->name('transaction.filter.view');
        ////////Invoice///////////
        Route::get('/transaction/invoice/receipt/{id}', 'TransactionInvoiceReceipt')->name('transaction.invoice.receipt');
    });
    // pos setting related route
    Route::controller(PosSettingsController::class)->group(function () {
        Route::get('/pos/settings/add', 'PosSettingsAdd')->name('pos.settings.add');
        // Route::get('/pos/settings/add', 'PosSettingsAdd')->name('pos.settings.add');
        Route::post('/pos/settings/store', 'PosSettingsStore')->name('pos.settings.store');
        Route::get('/pos/settings/view', 'PosSettingsView')->name('pos.settings.view');
        Route::get('/pos/settings/edit/{id}', 'PosSettingsEdit')->name('pos.settings.edit');
        Route::post('/pos/settings/update/{id}', 'PosSettingsUpdate')->name('pos.settings.update');
        Route::get('/pos/settings/delete/{id}', 'PosSettingsDelete')->name('pos.settings.delete');
        Route::post('/pos/switch_mode', 'switch_mode')->name('switch_mode');
    });
    // sale related routes
    Route::controller(SaleController::class)->group(function () {
        Route::get('/sale', 'index')->name('sale');
        Route::post('/sale/store', 'store')->name('sale.store');
        Route::get('/sale/view', 'view')->name('sale.view');
        Route::get('/sale/view-all', 'viewAll')->name('sale.view.all');
        Route::get('/sale/view/{id}', 'viewDetails')->name('sale.view.details');
        Route::get('/sale/edit/{id}', 'edit')->name('sale.edit');
        Route::post('/sale/update/{id}', 'update')->name('sale.update');
        Route::get('/sale/destroy/{id}', 'destroy')->name('sale.destroy');
        Route::get('/get/customer', 'getCustomer')->name('get.customer');
        Route::post('/add/customer', 'addCustomer')->name('add.customer');
        Route::get('/sale/invoice/{id}', 'invoice')->name('sale.invoice');
        Route::get('/sale/print/{id}', 'print')->name('sale.print');
        Route::get('/sale/filter', 'filter')->name('sale.filter');
        Route::get('/sale/find/{id}', 'find')->name('sale.find');
        Route::get('/product/find-qty/{id}', 'findQty')->name('product.find.qty');
        Route::post('/sale/transaction/{id}', 'saleTransaction')->name('sale.transaction');
        Route::get('/sale/customer/{id}', 'saleCustomer')->name('sale.customer');
        Route::get('/sale/promotions/{id}', 'salePromotions')->name('sale.promotions');
        Route::get('/product/barcode/find/{id}', 'findProductWithBarcode')->name('product.barcode.find');
    });
    // Transaction related route(n)
    Route::controller(EmployeeSalaryController::class)->group(function () {
        Route::get('/employee/salary/add', 'EmployeeSalaryAdd')->name('employee.salary.add');
        Route::get('/employee/salary/view', 'EmployeeSalaryView')->name('employee.salary.view');
        Route::post('/employee/salary/store', 'EmployeeSalaryStore')->name('employee.salary.store');
        Route::get('/employee/salary/edit/{id}', 'EmployeeSalaryEdit')->name('employee.salary.edit');
        Route::post('/employee/salary/update/{id}', 'EmployeeSalaryUpdate')->name('employee.salary.update');
        Route::get('/employee/salary/delete/{id}', 'EmployeeSalaryDelete')->name('employee.salary.delete');
        Route::get('/employee/branch/{branch_id}', 'BranchAjax'); //dependency
        Route::get('/employee/info/{employee_id}', 'getEmployeeInfo');
        /////////////////Employ Salary Advanced ////////////
        Route::get('/advanced/employee/salary/add', 'EmployeeSalaryAdvancedAdd')->name('advanced.employee.salary.add');
        Route::post('/advanced/employee/salary/store', 'EmployeeSalaryAdvancedStore')->name('advanced.employee.salary.store');
        Route::get('/advanced/employee/salary/view', 'EmployeeSalaryAdvancedView')->name('employee.salary.advanced.view');
        Route::get('/advanced/employee/salary/edit/{id}', 'EmployeeSalaryAdvancedEdit')->name('employee.salary.advanced.edit');
        Route::post('/advanced/employee/salary/update/{id}', 'EmployeeSalaryAdvancedUpdate')->name('employee.salary.advanced.update');
        Route::get('/advanced/employee/salary/delete/{id}', 'EmployeeSalaryAdvancedDelete')->name('employee.salary.advanced.delete');
    });
    // Report related routes
    Route::controller(ReportController::class)->group(function () {
        Route::group(['prefix' => 'report'], function () {
            Route::get('today', 'todayReport')->name('today.report');
            Route::get('summary', 'summaryReport')->name('summary.report');
            Route::get('low-stock', 'lowStockReport')->name('low.stock.report');
            Route::get('top-products', 'topProducts')->name('top.products.report');
            // Route::get('purchase', 'purchaseReport')->name('purchase.report');
            // Route::group(['prefix' => 'today'], function () {
            //     Route::get('ledger', 'customerLedger')->name('customer.ledger.report');
            //     Route::get('filter', 'customerLedgerFilter')->name('customer.ledger.filter');
            //     Route::get('due', 'customerDue')->name('customer.due.report');
            //     Route::get('due/filter', 'customerDueFilter')->name('customer.due.filter');
            // });
            Route::group(['prefix' => 'customer'], function () {
                Route::get('ledger', 'customerLedger')->name('customer.ledger.report');
                Route::get('filter', 'customerLedgerFilter')->name('customer.ledger.filter');
                Route::get('due', 'customerDue')->name('customer.due.report');
                Route::get('due/filter', 'customerDueFilter')->name('customer.due.filter');
            });
            Route::group(['prefix' => 'supplier'], function () {
                Route::get('ledger', 'supplierLedger')->name('suppliers.ledger.report');
                Route::get('filter', 'supplierLedgerFilter')->name('supplier.ledger.filter');
                Route::get('due', 'supplierDueReport')->name('supplier.due.report');
                Route::get('due/filter', 'supplierDueFilter')->name('supplier.due.filter');
            });
            Route::get('bank', 'bankReport')->name('bank.report');
            Route::get('stock', 'stockReport')->name('stock.report');
            //
            Route::get('/report/purchase', 'purchaseReport')->name('purchase.report');


            Route::get('/report/damage', 'damageReport')->name('damage.report');
            Route::post('/damage/print', 'damageReportPrint')->name('damage.report.print');
            Route::get('/damage/product/filter', 'DamageProductFilter')->name('damage.product.filter.view');



            Route::get('/purchese/product/filter', 'PurchaseProductFilter')->name('purches.product.filter.view');
            Route::get('/purchese/details/invoice/{id}', 'PurchaseDetailsInvoice')->name('purchse.details.invoice');
            //////////////Account Transaction Route /////////////
            Route::get('/account/transaction/view', 'AccountTransactionView')->name('account.transaction.view');
            Route::get('/account/transaction/filter', 'AccountTransactionFilter')->name('account.transaction.ledger.filter');
            //////////////Expense Report Route /////////////
            Route::get('/expense/report/view', 'ExpenseReport')->name('expense.report.view');
            Route::get('/expense/expense/filter', 'ExpenseReportFilter')->name('expense.report.filter');
            //////////////Employee Salary Report /////////////
            Route::get('/employee/salary/report/view', 'EmployeeSalaryReport')->name('employee.salary.report.view');
            Route::get('/employee/salary/filter', 'EmployeeSalaryReportFilter')->name('employee.salary.report.filter');
            /////////////Product Info Report //////////////
            Route::get('/product/info/report', 'ProductInfoReport')->name('product.info.report');
            // Route::get('/product/category/ajax/{categoryId}', 'ProductSubCategoryShow');
            Route::get('/product/info/filter/view', 'ProductInfoFilter')->name('product.info.filter.view');
            /////SMS Report ///////
            Route::get('/sms/report/view', 'SmsView')->name('sms.report');
            Route::get('/sms/report/filter', 'SmsReportFilter')->name('sms.report.filter');
            // MONNTHLY Report
            Route::get('/monthly/report', 'monthlyReport')->name('monthly.report');
        });
    });
    // Report related routes
    Route::controller(CRMController::class)->group(function () {
        Route::group(['prefix' => 'crm'], function () {
            Route::get('sms-page', 'smsToCustomerPage')->name('sms.To.Customer.Page');
            Route::post('sms', 'smsToCustomer')->name('sms.To.Customer');
            Route::get('email-page', 'emailToCustomerPage')->name('email.To.Customer.Page');
            Route::post('email', 'emailToCustomerSend')->name('email.To.Customer.Send');
        });
        Route::group(['prefix' => 'sms'], function () {
            Route::post('category', 'storeSmsCat')->name('sms.category.store');
            Route::get('category/view', 'viewSmsCat')->name('sms.category.view');
            Route::post('category/update/{id}', 'updateSmsCat')->name('sms.category.update');
            Route::get('category/delete/{id}', 'deleteSmsCat')->name('sms.category.delete');
        });
        //Customize Customer CRM
        Route::group(['prefix' => 'custimize-customer'], function () {
            Route::get('list', 'CustomerlistView')->name('customer.list.view');
            Route::get('filter.view', 'CustomerlistFilterView')->name('cutomer.Customize.filter.view');
        });
    });

    ///Email Marketing
    Route::controller(CustomeMailControler::class)->group(function () {
        Route::post('/customer-send-email', 'CustomerSendEmail')->name('customer.send.email');
    });
    ////////////////////Role And Permission Route /////////////////
    Route::controller(RolePermissionController::class)->group(function () {
                                 ///Permission///
        Route::get('/all/permission/view', 'AllPermissionView')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('permission.edit');
        Route::post('/update/permission', 'updatePermission')->name('permission.update');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('permission.delete');
                                 ///Role///
        Route::get('/all/role/view', 'AllRoleView')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('role.edit');
        Route::post('/update/role', 'updateRole')->name('role.update');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('role.delete');
                                ///Role In Permission///
        // Route::get('/all/role/permission//view', 'AllRolePermissionView')->name('all.role.permission');
        Route::get('/add/role/permission', 'AddRolePermission')->name('add.role.permission');
        Route::post('/store/role/permission', 'StoreRolePermission')->name('store.role.permission');
        Route::get('/edit/role/permission/{id}', 'EditRolePermission')->name('role.permission.edit');
        Route::post('/update/role/permission', 'updateRolePermission')->name('role.permission.update');
        Route::get('/delete/role/permission/{id}', 'DeleteRolePermission')->name('role.permission.delete');
        Route::post('/store/role/permission', 'StoreRolePermission')->name('role.permission.store');

    });
});

require __DIR__ . '/auth.php';
