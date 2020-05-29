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


Route::get('/', 'DashboardController@Dashboard');
Route::get('/report/', 'DashboardController@Report');

Route::get('/inventory/dashboard', 'InventoryController@Dashboard');

Route::get('/types/dashboard', 'TypesController@Dashboard');
Route::get('/types/delete/{id?}', 'TypesController@DeleteForm');
Route::get('/types/deleteType/{id?}', 'TypesController@Delete');
Route::get('/types/add/', 'TypesController@AddForm');
Route::post('/types/addType', 'TypesController@Add');
Route::get('/types/edit/{id?}', 'TypesController@EditForm');
Route::post('/types/editType', 'TypesController@Edit');

Route::get('/repair/dashboard', 'RepairController@Dashboard');
Route::get('/repair/add/{id?}', 'RepairController@AddForm');
Route::get('/repair/check/{id?}', 'RepairController@Check');
Route::post('/repair/addRepair', 'RepairController@Add');

Route::get('/decommission/add/{id?}', 'DecommissionController@AddForm');
Route::get('/decommission/dashboard', 'DecommissionController@Dashboard');
Route::post('/decommission/addDecommission', 'DecommissionController@addDecommission');

Route::get('/supplier/dashboard', 'SupplierController@Dashboard');
Route::get('/supplier/delete/{id?}', 'SupplierController@DeleteForm');
Route::get('/supplier/deleteSupplier/{id?}', 'SupplierController@Delete');
Route::get('/supplier/add/', 'SupplierController@AddForm');
Route::post('/supplier/addSupplier', 'SupplierController@Add');
Route::get('/supplier/edit/{id?}', 'SupplierController@EditForm');
Route::post('/supplier/editSupplier', 'SupplierController@Edit');

Route::get('/equipment/dashboard', 'EquipmentController@Dashboard');
Route::get('/equipment/add', 'EquipmentController@AddForm');
Route::post('/equipment/addEquipment', 'EquipmentController@Add');

Route::get('/users/dashboard', 'UsersController@Dashboard');
Route::get('/users/add/', 'UsersController@AddForm');
Route::post('/users/addUser', 'UsersController@Add');
Route::get('/users/delete/{id?}', 'UsersController@Delete');
Route::get('/users/deleteUser/{id?}', 'UsersController@DeleteUser');
Route::get('/users/edit/{id?}', 'UsersController@EditForm');
Route::post('/users/editUser', 'UsersController@EditUser');
Route::get('/users/equipment/{id?}', 'UsersController@Equipment');