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
//    return view('index');
    return view('home');
})
    ->name('home');

Route::get('/sign-up', function () {
    return view('sign_up');
})
    ->name('signUpForm');

Route::post('/sign-up', 'SignUpController@signUp')
    ->name('signUp');

Route::get('/sign-in', 'AuthController@showSignInForm')
    ->name('showSignInForm');
Route::post('/sign-in', 'AuthController@signIn')
    ->name('signIn');
//
//Route::get('/sign-out', '');
Route::get('/dashboard', 'DashboardController@list')
    ->name('dashboard');
//
//Route::post('/wish/new', '')
//    ->name('createWish');
//Route::get('/wish/{id}', '')
//    ->name('detailWish');
//Route::post('/wish/{id}', '')
//    ->name('updateWish');
//Route::post('/wish/{id}/delete', '')
//    ->name('deleteWish');
