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

Route::group(['prefix' => 'back', 'middleware' => ['auth', 'preventBackHistory']], function () {
    // home
    Route::get('/', 'DashboardController@index')->name('home');

    // Settings
    Route::get('/settings', ['uses' => 'Admin\SettingsController@index', 'as' => 'setting']);
    Route::put('/settings/update', ['uses' => 'Admin\SettingsController@update', 'as' => 'setting-update']);

    //Permissions
    Route::get('/permission', ['uses' => 'Admin\PermissionsController@index', 'as' => 'permission-list']);
    Route::get('/permission/create', ['uses' => 'Admin\PermissionsController@create', 'as' => 'permission-create']);
    Route::post('/permission/store', 'Admin\PermissionsController@store');
    Route::get('/permission/edit/{id}', ['uses' => 'Admin\PermissionsController@edit', 'as' => 'permission-edit']);
    Route::put('/permission/edit/{id}', ['uses' => 'Admin\PermissionsController@update', 'as' => 'permission-update']);
    Route::delete('/permission/delete/{id}', ['uses' => 'Admin\PermissionsController@destroy', 'as' => 'permission-delete']);

    //Roles
    Route::get('/roles', ['uses' => 'Admin\RolesController@index', 'as' => 'role-list']);
    Route::get('/roles/create', ['uses' => 'Admin\RolesController@create', 'as' => 'role-create']);
    Route::post('/roles/store', 'Admin\RolesController@store');
    Route::get('/roles/edit/{id}', ['uses' => 'Admin\RolesController@edit', 'as' => 'role-edit']);
    Route::put('/roles/edit/{id}', ['uses' => 'Admin\RolesController@update', 'as' => 'role-update']);
    Route::delete('/roles/delete/{id}', ['uses' => 'Admin\RolesController@destroy', 'as' => 'role-delete']);
});
