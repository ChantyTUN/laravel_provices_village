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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PatientController@index')->name('patient.index');
Route::get('/patient-create', 'PatientController@create')->name('patient.create');

// Patient Provice Ajax
Route::get('/province-get/ajax/{provice_id}', 'PatientController@proviceAjax')->name('provice.get.ajax');
Route::get('/district-get/ajax/{district_id}', 'PatientController@districtAjax')->name('district.get.ajax');
Route::get('/commune-get/ajax/{commune_id}', 'PatientController@communeAjax')->name('commune.get.ajax');

Route::post('/store/patient', 'PatientController@storePatient')->name('store.patient');



