<?php

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
// Employees Routes
Route::resource('employee', 'EmployeeController');   

// Customers Routes
Route::resource('customer', 'CustomerController');    

// Suppliers Routes
Route::resource('supplier', 'SupplierController'); 

// Salaries Routes
Route::get('salary/paid', 'AdvanceSalaryController@paidSalaries')->name('salary.paid');  
Route::resource('salary', 'AdvanceSalaryController'); 

// Category Routes  
Route::resource('category', 'CategoryController');

// Products Routes   
Route::resource('product', 'ProductController');

// Expense Routes   
Route::resource('expense', 'ExpenseController');                             
Route::get('montnly', 'ExpenseController@montnly')->name('expense.montnly');                             
Route::get('monthly/{month}', 'ExpenseController@single')->name('expense.single');                              

// Attendance Routes   
Route::resource('attendance', 'AttendanceController');   
Route::get('monthly', 'AttendanceController@single')->name('attendance.single');  

// Settings Routes   
Route::resource('setting', 'SettingController');    
    
       
Route::get('/', function () {    
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  
