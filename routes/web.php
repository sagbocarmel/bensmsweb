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
    return view('home');
});

Auth::routes();

Route::get('/sms/parent/about', function () {
    return view('about');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function (){

    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/ben/sms/user/create', 'WEB\UserController@create')->name('create_user');
    Route::get('/ben/sms/user/show/{id}', 'WEB\UserController@show')->name('show_user');
    Route::post('/ben/sms/users/store', 'WEB\UserController@store')->name('store_user');
    Route::put('/ben/sms/user/update/{id}/{id_role}', 'WEB\UserController@update')->name('update_user');
    Route::delete('/ben/sms/user/delete/{id}', 'WEB\UserController@destroy')->name('delete_user');
    Route::get('/ben/sms/user/edit/{id}', 'WEB\UserController@edit')->name('edit_user');
    Route::get('/ben/sms/user/list', 'WEB\UserController@index')->name('list_user');

    Route::get('/ben/sms/view/import', 'WEB\SmsController@importExportView')->name('import_sms');
    Route::post('/ben/sms/import', 'WEB\SmsController@import')->name('store_import_sms');
    Route::get('/ben/sms/sent', 'WEB\SmsController@sentSMS')->name('sent_sms');
    Route::get('/ben/sms/waiting', 'WEB\SmsController@waitingSMS')->name('waiting_sms');
    Route::get('/ben/sms/credit', 'WEB\SmsController@creditSMS')->name('credit_sms');

    Route::get('/ben/sms/create', 'WEB\SmsController@create')->name('create_sms');
    Route::post('/ben/sms/store', 'WEB\SmsController@store')->name('store_sms');
    Route::get('/ben/sms/show/{id}', 'WEB\SmsController@show')->name('show_sms');
    Route::put('/ben/sms/update/{id}', 'WEB\SmsController@update')->name('update_sms');
    Route::get('/ben/sms/list', 'WEB\SmsController@index')->name('list_sms');
    Route::get('/ben/sms/list/delivered', 'WEB\SmsController@indexDelivered')->name('delivered_sms');
    Route::get('/ben/sms/list/not-sent', 'WEB\SmsController@indexNotSent')->name('not_sent_sms');
    Route::get('/ben/sms/list/scheduled', 'WEB\SmsController@indexScheduled')->name('scheduled_sms');
    Route::get('/ben/sms/list/waiting', 'WEB\SmsController@indexWaiting')->name('waiting_sms');
    Route::get('/ben/sms/edit/{id}', 'WEB\SmsController@edit')->name('edit_sms');
    Route::get('/ben/sms/list/rejected', 'WEB\SmsController@indexRejected')->name('rejected_sms');
    Route::get('/ben/sms/delete/{id}', 'WEB\SmsController@destroy')->name('delete_sms');

    //Route::get('/ben/sms/import', 'WEB\SmsVerifyController@')->name('import_file');

});

