<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('obat', 'ObatController');
Route::post('/obat/getEditForm', 'ObatController@getEditForm')->name('obat.getEditForm');
Route::post('/obat/saveData', 'ObatController@saveData')->name('obat.saveData');
Route::post('/obat/deleteData', 'ObatController@deleteData')->name('obat.deleteData');

Route::resource('kategori', 'KategoriController');
Route::post('/kategori/getEditForm', 'KategoriController@getEditForm')->name('kategori.getEditForm');
Route::post('/kategori/saveData', 'KategoriController@saveData')->name('kategori.saveData');
Route::post('/kategori/deleteData', 'KategoriController@deleteData')->name('kategori.deleteData');
Route::post('/kategori/saveDataField', 'KategoriController@saveDataField')->name('kategori.saveDataField');

Route::resource('users', 'UserController');

Route::resource('supplier', 'SupplierController');
Route::post('/supplier/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm');
Route::post('/supplier/saveData', 'SupplierController@saveData')->name('supplier.saveData');
Route::post('/supplier/saveDataField', 'SupplierController@saveDataField')->name('supplier.saveDataField');
Route::post('/supplier/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData');

