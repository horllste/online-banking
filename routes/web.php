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

//Customers Web Route File


Route::get('/login', function () {
    return view('auth.customer.login');
})->name("login");

Route::get('/reset/account', function () {
    return view('auth.customer.reset_password');
})->name("reset_account");



Route::post('/login','Auth\AuthController@login')->name('process_login');
Route::get('/logout','Auth\AuthController@logout')->name('logout');

Route::post('/reset/account','Auth\AuthController@reset_account')->name('reset_account');
Route::get('/reset/password/setup','Auth\AuthController@reset_account')->name('password_setup');
Route::get('/reset/password/setup/{code}','Auth\AuthController@start_account_password');

Route::post('/set/password','Auth\AuthController@set_account_password')->name('set_password');



Route::group(array('middleware' => 'auth'), function(){

    Route::get('/dashboard','Customer\DashboardController@index');
    Route::get('/','Customer\DashboardController@index')->name('dashboard');

    //Bank Account Management
    Route::get('/accounts','Customer\BankAccountController@index')->name('accounts');
    Route::get('/account/transactions/{id}','Customer\BankAccountController@transactions')->name('account_history');
    Route::get('/transactions','Customer\BankAccountController@all_transactions')->name('all_transactions');
    
    //Cards Management
    Route::get('/cards','Customer\CardController@index')->name('cards');


});