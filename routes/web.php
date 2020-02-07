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
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes(['register' => false]);
// Auth::routes();





Route::middleware(['auth'])->group(function(){

Route::any('/search', 'ExpensesController@search')->name('search');
// Route::get('/search', function() {
//     $model = App\Expenses::query();

//     return DataTables::eloquent($model)
//                 ->filter(function ($query) {
//                     if (request()->has('date')) {
//                         $query->where('date', 'like', "%" . request('from_date') . "%");
//                     }

//                     if (request()->has('date')) {
//                         $query->where('date', 'like', "%" . request('to_date') . "%");
//                     }
//                 })
//                 ->toJson();
//             });

Route::any('/home', 'HomeController@index')->name('home');
Route::any('/updateuser/{id}','HomeController@updateuser');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/profile','HomeController@showChangePasswordForm');
Route::any('sellitem/item', 'SellController@item');
Route::any('ViewUser/restore/{id}', 'ViewUserController@restore');
Route::any('invoice/restore/{id}', 'InvoiceController@restore');
Route::any('vendor/restore/{id}', 'VendorController@restore');
Route::any('unit/restore/{id}', 'UnitController@restore');
Route::any('item/restore/{id}', 'ItemController@restore');
Route::any('branch/restore/{id}', 'BranchController@restore');
Route::any('expenses/restore/{id}', 'ExpensesController@restore');
Route::any('emp/restore/{id}', 'EmployeeController@restore');
// Route::any('employee/edit/{id}', 'EmployeeController@edit');
Route::resource('ViewUser', 'ViewUserController');
Route::any('attendance/show/{id}', 'AttendanceController@show');
Route::any('attendance/edit/{id}', 'AttendanceController@edit');
Route::any('attendance/calculate', 'AttendanceController@calculate');
Route::any('attendance/{id}', 'AttendanceController@store');

Route::any('attendance/update/{id}', 'AttendanceController@update');

Route::resources([
    'vendor' => 'VendorController',
    'item' => 'ItemController',
    'branch' => 'BranchController',
    'unit' => 'UnitController',
    'employee' => 'EmployeeController',
    'attee' => 'AttendanceController',
    'invoice' => 'InvoiceController',
    'expenses' => 'ExpensesController',
    'sell' => 'SellController',
     // 'profile' => 'ProfileController'
    
]);
 // Route::resource('sell', 'SellController');
 // Route::get('/general', 'GaneralController@index');
});



   

