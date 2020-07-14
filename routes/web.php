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

});
