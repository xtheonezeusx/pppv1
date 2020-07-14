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
    return view('welcome');
});

Auth::routes();

Route::get('preview', 'PeriodController@selectPeriod')->name('preview')->middleware('auth');

Route::post('setPeriodo', 'PeriodController@setPeriodo')->name('setPeriodo')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('preview', 'PeriodController@selectPeriod')->name('preview')->middleware('auth');

Route::post('setPeriodo', 'PeriodController@setPeriodo')->name('setPeriodo')->middleware('auth');

Route::group([
'namespace' => 'Admin',
'middleware' => 'auth'], function() {

    Route::resource('periodos', 'PeriodController');
    
});

// from here goes to the admin view
Route::group([
'prefix' => 'admin',
'namespace' => 'Admin',
'middleware' => ['auth', 'periodo']
], function() {

    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('estudiantes', 'StudentController');

    Route::get('estudiantes/{id}/asesores/create', 'AdviserController@create')->name('asesores.create');
    Route::post('estudiantes/{id}/asesores', 'AdviserController@store')->name('asesores.store');
    Route::get('estudiantes/{estudiante}/asesores/{asesor}/edit', 'AdviserController@edit')->name('asesores.edit');
    Route::put('estudiantes/{estudiante}/asesores/{asesor}', 'AdviserController@update')->name('asesores.update');
    Route::delete('estudiantes/{estudiante}/asesores/{asesor}', 'AdviserController@destroy')->name('asesores.destroy');

    Route::get('estudiantes/{id}/instituciones/create', 'InstitutionController@create')->name('instituciones.create');
    Route::post('estudiantes/{id}/instituciones', 'InstitutionController@store')->name('instituciones.store');
    Route::get('estudiantes/{estudiante}/instituciones/{institution}/edit', 'InstitutionController@edit')->name('instituciones.edit');
    Route::put('estudiantes/{estudiante}/instituciones/{institution}', 'InstitutionController@update')->name('instituciones.update');
    Route::delete('estudiantes/{estudiante}/instituciones/{institution}', 'InstitutionController@destroy')->name('instituciones.destroy');

});
