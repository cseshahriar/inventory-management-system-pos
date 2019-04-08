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
Route::resource('salary', 'SalaryController');        
Route::get('pay/salary', 'SalaryController@pay')->name('salary.pay');       
Route::get('last-month/salary', 'SalaryController@lastMonthSalary')->name('salary.lastmonth');        

Route::get('/', function () {  
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  
