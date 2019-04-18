<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Users Routes
Route::get('user/profile', 'UsersController@profile')->name('user.profile');   
Route::get('user/setting', 'UsersController@setting')->name('user.setting');     
Route::post('user/setting/update', 'UsersController@settingUpdate')->name('user.setting.update');     
Route::resource('user', 'UsersController');  

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
route::get('/invoice/pdf/{id}', 'CartController@invoicePdf')->name('invoice.pdf'); 
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

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update'); 

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice'); 
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/home', 'HomeController@index')->name('home');  
