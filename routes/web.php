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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company', 'CompanyController@index');
Route::get('/company/edit/{id}', 'CompanyController@edit');
Route::get('/company/destroy/{id}', 'CompanyController@destroy');
Route::get('/company/show','CompanyController@show');
Route::get('/company/show/all','CompanyController@all');
Route::get('/company/show/name','CompanyController@getCompanyId');
Route::post('/company/store', 'CompanyController@store');
Route::post('/company/update','CompanyController@update');

Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/show', 'EmployeeController@show');
Route::get('/employee/show/all', 'EmployeeController@all');
Route::get('/employee/show/name', 'EmployeeController@getEmployeeId');
Route::post('/employee/store', 'EmployeeController@store');
Route::post('/employee/update', 'EmployeeController@update');
Route::get('/employee/edit/{id}', 'EmployeeController@edit');
Route::get('/employee/destroy/{id}', 'EmployeeController@destroy');

Route::get('/doctor', 'DoctorController@index');
Route::get('/doctor/show', 'DoctorController@show');
Route::get('/doctor/show/name', 'DoctorController@getDoctorId');
Route::get('/doctor/show/all', 'DoctorController@all');
Route::post('/doctor/store', 'DoctorController@store');
Route::post('/doctor/update', 'DoctorController@update');
Route::get('/doctor/edit/{id}', 'DoctorController@edit');
Route::get('/doctor/destroy/{id}', 'DoctorController@destroy');

Route::get('/service', 'ServiceController@index');
Route::get('/service/recent', 'ServiceController@getRecent');
Route::get('/service/scheduled', 'ServiceController@getScheduled');
Route::get('/service/not/finished', 'ServiceController@getNotFinished');
Route::get('/service/finished', 'ServiceController@getFinished');
Route::get('/service/cancel', 'ServiceController@getCancel');
Route::get('/service/cancel/{id}', 'ServiceController@cancel');
Route::get('/service/create', 'ServiceController@create');
Route::get('/service/show/details/{id}', 'ServiceController@show');
Route::get('/service/show/seach', 'ServiceController@seach');
Route::post('/service/finished', 'ServiceController@finished');
Route::post('/service/store', 'ServiceController@store');
Route::get('/service/destroy/{id}', 'ServiceController@destroy');
Route::get('/service/destroy/exam/{id}', 'ServiceController@destroyExam');
Route::get('/service/edit/{id}', 'ServiceController@edit');

Route::get('/exam', 'ExamController@index');
Route::get('/exam/show', 'ExamController@show');
Route::get('/exam/show/all', 'ExamController@all');
Route::get('/exam/show/name', 'ExamController@getExamId');
Route::post('/exam/store', 'ExamController@store');
Route::post('/exam/update', 'ExamController@update');
Route::get('/exam/edit/{id}', 'ExamController@edit');
Route::get('/exam/destroy/{id}', 'ExamController@destroy');

