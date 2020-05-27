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

Route::get('/', 'Front\PagesController@index');
Route::get('/gallerie', 'Front\GallerieController@index');
Route::get('/album/{album}', 'Front\GallerieController@album')->name('albums');

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

    // Categories
    Route::get('/categories', ['uses' => 'Admin\CategoriesController@index', 'as' => 'category-list', 'middleware' => 'permission:Category List|All']);
    Route::get('/categories/create', ['uses' => 'Admin\CategoriesController@create', 'as' => 'category-create', 'middleware' => 'permission:Category Add|All']);
    Route::post('/categories/store', 'Admin\CategoriesController@store')->name('category-store');
    Route::get('/categories/edit/{id}', ['uses' => 'Admin\CategoriesController@edit', 'as' => 'category-edit', 'middleware' => 'permission:Category Update|All']);
    Route::put('/categories/edit/{id}', ['uses' => 'Admin\CategoriesController@update', 'as' => 'category-update']);
    Route::delete('/categories/delete/{id}', ['uses' => 'Admin\CategoriesController@destroy', 'as' => 'category-delete', 'middleware' => 'permission:Category Delete|All']);

    // Plan
    Route::get('/plan/{category}', ['uses' => 'Admin\PlansController@index', 'as' => 'plan-list', 'middleware' => 'permission:Plan List|All']);
    Route::get('/plan/{category}/create', ['uses' => 'Admin\PlansController@create', 'as' => 'plan-create', 'middleware' => 'permission: Plan Add|All']);
    Route::post('/plan/store', 'Admin\PlansController@store')->name('plan-store');
    Route::get('/plan/edit/{id}', ['uses' => 'Admin\PlansController@edit', 'as' => 'plan-edit', 'middleware' => 'permission:Plan Update|All']);
    Route::put('/plan/edit/{id}', ['uses' => 'Admin\PlansController@update', 'as' => 'plan-update']);
    Route::delete('/plan/delete/{id}', ['uses' => 'Admin\PlansController@destroy', 'as' => 'plan-delete', 'middleware' => 'permission:Plan Delete|All']);

    // Options
    Route::get('/options/{plan}', ['uses' => 'Admin\OptionsController@index', 'as' => 'option-list', 'middleware' => 'permission:Option List|All']);
    Route::get('/options/{plan}/create', ['uses' => 'Admin\OptionsController@create', 'as' => 'option-create', 'middleware' => 'permission: Option Add|All']);
    Route::post('/options/store', 'Admin\OptionsController@store')->name('option-store');
    Route::get('/options/edit/{id}', ['uses' => 'Admin\OptionsController@edit', 'as' => 'option-edit', 'middleware' => 'permission:Option Update|All']);
    Route::put('/options/edit/{id}', ['uses' => 'Admin\OptionsController@update', 'as' => 'option-update']);
    Route::delete('/options/delete/{id}', ['uses' => 'Admin\OptionsController@destroy', 'as' => 'option-delete', 'middleware' => 'permission:Option Delete|All']);

    // Albums
    Route::get('/albums', ['uses' => 'Admin\AlbumsController@index', 'as' => 'album-list', 'middleware' => 'permission:Album List|All']);
    Route::get('/albums/create', ['uses' => 'Admin\AlbumsController@create', 'as' => 'album-create', 'middleware' => 'permission: Album Add|All']);
    Route::post('/albums/store', 'Admin\AlbumsController@store')->name('album-store');
    Route::get('/albums/edit/{id}', ['uses' => 'Admin\AlbumsController@edit', 'as' => 'album-edit', 'middleware' => 'permission:Album Update|All']);
    Route::put('/albums/edit/{id}', ['uses' => 'Admin\AlbumsController@update', 'as' => 'album-update']);
    Route::delete('/albums/delete/{id}', ['uses' => 'Admin\AlbumsController@destroy', 'as' => 'album-delete', 'middleware' => 'permission:Album Delete|All']);

    // Photos
    Route::get('/photos', ['uses' => 'Admin\PhotosController@index', 'as' => 'photo-list', 'middleware' => 'permission:Photo List|All']);
    Route::get('/photos/create', ['uses' => 'Admin\PhotosController@create', 'as' => 'photo-create', 'middleware' => 'permission: Photo Add|All']);
    Route::post('/photos/store', 'Admin\PhotosController@store')->name('photo-store');
    Route::get('/photos/{photo}', 'Admin\PhotosController@show')->name('photo-show');
    Route::get('/photos/edit/{id}', ['uses' => 'Admin\PhotosController@edit', 'as' => 'photo-edit', 'middleware' => 'permission:Photo Update|All']);
    Route::put('/photos/edit/{id}', ['uses' => 'Admin\PhotosController@update', 'as' => 'photo-update']);
    Route::delete('/photos/delete/{id}', ['uses' => 'Admin\PhotosController@destroy', 'as' => 'photo-delete', 'middleware' => 'permission:Photo Delete|All']);
});
