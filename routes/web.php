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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth','routeAuthorize']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('departments', 'DepartmentsController');

    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
});


