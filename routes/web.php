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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'HomeController@register')->name('register');
$this->post('register', 'HomeController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/student/get/{id}', 'StudentController@getOne');
    //     // create
    // Route::get('/student/create', 'StudentController@createOneForm');
    // Route::post('/student/create', 'StudentController@createOneAction');
    //     // update
    // Route::get('/student/update', 'StudentController@updateOneForm');
    // Route::post('/student/update', 'StudentController@updateOneAction');
    //     // delete
    // Route::post('/student/delete', 'StudentController@deleteOne');
});

// CRUD albums
Route::get('/albums', 'AlbumController@getAll');

// Base route
Route::get('/{all?}', 'NavController@showPage');
