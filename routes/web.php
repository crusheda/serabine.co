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
Auth::routes();
Route::middleware('auth')->group(function (){
Route::get('/', 'dashboard@index')->name('dashboard');
Route::resource('karyawan', 'karyawanController');
Route::get('/mamdani', 'mamdaniController@index')->name('hitung');
Route::get('/mamdani/simpan', 'mamdaniController@simpanOutput');
Route::get('/hasil','historyController@index')->name('hasil');
});
// Route::get('/', 'HomeController@index')->name('home');
