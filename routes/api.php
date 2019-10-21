<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    |Users Ressources Routes
    |
    |
    */
    Route::post('logout','API\UserController@logoutApi');

    Route::get('abc/users',[
        'uses' => 'API\UserController@getList',
        'as' => 'list_users',
        'middleware'=>['permissions'],
        'roles' => ['Admin','User'],
        'elts' => ['48c5m_Utilisateur']
    ]);
});





