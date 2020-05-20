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

    // Account
    Route::get('/accounts', ['uses' => 'Admin\AccountsController@index', 'as' => 'account-list', 'middleware' => 'permission:Account List|All']);
    Route::get('/accounts/create', ['uses' => 'Admin\AccountsController@create', 'as' => 'account-create', 'middleware' => 'permission:Account Add|All']);
    Route::post('/accounts/store', 'Admin\AccountsController@store');
    Route::get('/accounts/edit/{id}', ['uses' => 'Admin\AccountsController@edit', 'as' => 'account-edit', 'middleware' => 'permission:Account Update|All']);
    Route::put('/accounts/edit/{id}', ['uses' => 'Admin\AccountsController@update', 'as' => 'account-update']);
    Route::delete('/accounts/delete/{id}', ['uses' => 'Admin\AccountsController@destroy', 'as' => 'account-delete', 'middleware' => 'permission:Account Delete|All']);
    Route::get('/mysettings', ['uses' => 'Admin\AccountsController@getMySettings', 'as' => 'my-setting']);
    Route::put('/mysettings', ['uses' => 'Admin\AccountsController@putMySettings', 'as' => 'my-setting-update']);

    // About
    Route::get('/about', ['uses' => 'Admin\AboutController@index', 'as' => 'about-list', 'middleware' => 'permission:About List|All']);
    Route::get('/about/create', ['uses' => 'Admin\AboutController@create', 'as' => 'about-create', 'middleware' => 'permission:About Add|All']);
    Route::post('/about/store', 'Admin\AboutController@store')->name('about-store');
    Route::get('/about/edit/{id}', ['uses' => 'Admin\AboutController@edit', 'as' => 'about-edit', 'middleware' => 'permission:About Update|All']);
    Route::put('/about/edit/{id}', ['uses' => 'Admin\AboutController@update', 'as' => 'about-update']);
    Route::delete('/about/delete/{id}', ['uses' => 'Admin\AboutController@destroy', 'as' => 'about-delete', 'middleware' => 'permission:About Delete|All']);
});
