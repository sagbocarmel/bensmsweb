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

//Route::get('/', function () {
//    return view('vue');
//});

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{any?}', function (){
    return view('vue');
})->where('any', '[\/\w\.-]*');

Auth::routes();

