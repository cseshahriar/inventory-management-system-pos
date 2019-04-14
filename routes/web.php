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
Route::get('product/export', 'ProductController@export')->name('product.export');  
Route::get('product/import/create', 'ProductController@productImport')->name('product.import.create');       
Route::post('product/import', 'ProductController@import')->name('product.import');      

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

// POS Routes   
Route::resource('pos', 'PosController');     

// POS Routes / carts routes 
route::post('/add-cart', 'CartController@store');
route::post('/qty-update/{rowId}', 'CartController@update');
route::post('/cart-remove/{rowId}', 'CartController@destroy');    

//  Invoice routes 
route::post('/create-invoice', 'CartController@invoice');      
route::post('/final-invoice', 'CartController@finalInvoice');          
    
// Pending Orders
route::get('/pending/order', 'OrderController@index')->name('pending.order'); 
route::get('/order/show/{id}', 'OrderController@show')->name('order.show');  
route::get('/pos-done/{id}', 'OrderController@done')->name('pos.done');      

route::get('/order/success', 'OrderController@success')->name('success.order');     
route::get('/order/success-show/{id}', 'OrderController@successShow')->name('order.success.show');         

Route::get('/', function () {    
    return view('auth.login'); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  
