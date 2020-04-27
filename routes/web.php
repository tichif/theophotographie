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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['prefix'=> 'back','middleware'=>'auth'], function(){
    // home
    Route::get('/', 'DashboardController@index')->name('home');

    // Settings
    Route::get('/settings', ['uses' => 'Admin\SettingsController@index', 'as' => 'setting']);
    Route::put('/settings/update', ['uses' => 'Admin\SettingsController@update', 'as' => 'setting-update']);
});
