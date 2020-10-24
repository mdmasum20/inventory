<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PosController;

Route::get('/', function () {
    return redirect()->route('login');
});


// This Auth route use for email verification
// Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee route start-----------------
Route::get('/new-employee', [EmployeeController::class, 'newEmployee'])->name('new.employee');
Route::post('/add-employee', [EmployeeController::class, 'addEmployee']);
Route::get('/all-employee', [EmployeeController::class, 'allEmployee'])->name('all.emoloyee');
Route::get('/view-employee/{id}', [EmployeeController::class, 'viewEmployee']);
Route::get('/delete-employee/{id}', [EmployeeController::class, 'deleteEmployee']);
Route::get('/eid-employee/{id}', [EmployeeController::class, 'editEmployee']);
Route::post('/update-employee/{id}', [EmployeeController::class, 'updateEmployee']);
// Employee route end-------------------

// Custober/Buyer route start-----------------
Route::get('/new-customer', [CustomerController::class, 'newCustomer'])->name('new.customer');
Route::post('/add-customer', [CustomerController::class, 'addCustomer']);
Route::get('/all-customer', [CustomerController::class, 'allCustomer'])->name('all.customer');
Route::get('/view-customer/{id}', [CustomerController::class, 'viewCustomer']);
Route::get('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer']);
Route::get('/eid-customer/{id}', [CustomerController::class, 'editCustomer']);
Route::post('/update-customer/{id}', [CustomerController::class, 'updateCustomer']);
// Custober/Buyer route end-------------------

// Supplier route start-----------------
Route::get('/new-supplier', [SupplierController::class, 'newSupplier'])->name('new.supplier');
Route::post('/add-supplier', [SupplierController::class, 'addSupplier']);
Route::get('/all-supplier', [SupplierController::class, 'allSupplier'])->name('all.supplier');
Route::get('/view-supplier/{id}', [SupplierController::class, 'viewSupplier']);
Route::get('/delete-supplier/{id}', [SupplierController::class, 'deleteSupplier']);
Route::get('/eid-supplier/{id}', [SupplierController::class, 'editSupplier']);
Route::post('/update-supplier/{id}', [SupplierController::class, 'updateSupplier']);
// Supplier route end-----------------

// Salary route start-----------------
Route::get('/pay-salary', [SalaryController::class, 'paySalary'])->name('pay.salary');
Route::get('/advance-salary', [SalaryController::class, 'payAdvanceSalary'])->name('pay_advance.salary');
Route::post('/pay-add-employee', [SalaryController::class, 'insertAdvanceSallary']);
Route::post('/insert_paying-salaey', [SalaryController::class, 'insertPayingSallary']);
Route::get('/new-paySalary', [SalaryController::class, 'newPaySalary'])->name('new.paySalary');
Route::get('/all-salary', [SalaryController::class, 'allSalary'])->name('all.salary');
// Route::get('/view-supplier/{id}', [SupplierController::class, 'viewSupplier']);
// Route::get('/delete-supplier/{id}', [SupplierController::class, 'deleteSupplier']);
// Route::get('/eid-supplier/{id}', [SupplierController::class, 'editSupplier']);
// Route::post('/update-supplier/{id}', [SupplierController::class, 'updateSupplier']);
// Salary route end-----------------

// Category route start-----------------
Route::get('/all-category', [CategoryController::class, 'allCategory'])->name('all.category');
Route::get('/new-category', [CategoryController::class, 'newCategory'])->name('new.category');
Route::post('/add-category', [CategoryController::class, 'insertCategory']);
Route::get('/active-deactive-category/{id}', [CategoryController::class, 'ActiveDeactiveCategory']);
Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);
// Category route end-----------------

// Product route start-----------------
Route::get('/new-product', [ProductController::class, 'newProduct'])->name('new.product');
Route::post('/add-product', [ProductController::class, 'addProduct']);
Route::get('/all-product', [ProductController::class, 'allProduct'])->name('all.product');
Route::get('/import-product', [ProductController::class, 'importProduct'])->name('import.product');
Route::get('/export-product', [ProductController::class, 'export'])->name('export.product');
Route::post('/import', [ProductController::class, 'import'])->name('import');
Route::get('/view-product/{id}', [ProductController::class, 'viewProduct']);
Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/eid-product/{id}', [ProductController::class, 'editProduct']);
Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);
// Product route end-------------------

// Expense route start-----------------
Route::get('/new-expense', [ExpenseController::class, 'newExpense'])->name('new.expense');
Route::post('/add-expense', [ExpenseController::class, 'addExpense']);
Route::get('/all-expense', [ExpenseController::class, 'allExpense'])->name('all.expense');
Route::get('/today.expense', [ExpenseController::class, 'todayExpense'])->name('today.expense');
Route::get('/this-month-expense', [ExpenseController::class, 'ThisMonthExpense'])->name('this.month.expense');
Route::get('/this-year-expense', [ExpenseController::class, 'ThisYearExpense'])->name('this.year.expense');
Route::get('/view-expense/{id}', [ExpenseController::class, 'viewExpense']);
Route::get('/delete-expense/{id}', [ExpenseController::class, 'deleteExpense']);
Route::get('/edit-expense/{id}', [ExpenseController::class, 'editExpense']);
Route::post('/update-expense/{id}', [ExpenseController::class, 'updateExpense']);
// Expense route end-------------------

// Attendence route start-----------------
Route::get('/take.attendence', [AttendenceController::class, 'takeAttendence'])->name('take.attendence');
Route::post('/insert-attendence', [AttendenceController::class, 'insertAttendence']);
Route::get('/all-attendence', [AttendenceController::class, 'allAttendence'])->name('all.attendence');
Route::get('/view-attendence/{attendance_date}', [AttendenceController::class, 'viewAttendence']);
Route::get('/eid-attendence/{attendance_date}', [AttendenceController::class, 'editAttendence']);
Route::post('/update-attendence', [AttendenceController::class, 'updateAttendence']);
// Attendence route end-------------------

// Settings route start-----------------
Route::get('/company.settings', [SettingController::class, 'companySettings'])->name('company.settings');
Route::post('/update-setting/{id}', [SettingController::class, 'updateSettings']);
// Settings route end-------------------

// Pos route start-----------------
Route::get('/pos', [PosController::class, 'index'])->name('pos');
// Route::post('/update-setting/{id}', [PosController::class, 'updateSettings']);
// Pos route end-------------------


// single route control to access without mail verification
// Route::get('/inbox', function () {
//     echo "Inbox here";
// })->name('inbox')->middleware('verified');


// single route control to access without mail verification
// Route::group(['middleware' => 'verified'], function(){

//     Route::get('/inbox', function () {
//         echo "Inbox here";
//     })->name('inbox');

//     Route::get('/calendar', function () {
//         echo "Inbox here";
//     })->name('calendar');

// });


