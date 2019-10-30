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

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact abc owner'], 404);
});
Route::post('bensms/admin/register', 'UserRoleController@store');

Route::post('bensms/login', 'UserRoleController@login');

Route::post('bensms/logout', 'UserRoleController@logoutApi');

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

    Route::get('bensms/users',[
        'uses' => 'UserRoleController@index',
        'as' => 'list_users',
        'roles' => ['Admin'],
    ]);

    Route::post('bensms/user',[
        'uses' => 'UserRoleController@store',
        'as' => 'create_user',
        'roles' => ['Admin'],
    ]);

    Route::get('bensms/user/{id}',[
        'uses' => 'UserRoleController@show',
        'as' => 'get_users',
        'roles' => ['Admin'],
    ]);

    Route::get('bensms/user',[
        'uses' => 'UserRoleController@getUser',
        'as' => 'find_user',
        'roles' => ['Admin','User'],
    ]);

    Route::put('bensms/user/{id}',[
        'uses' => 'UserRoleController@update',
        'as' => 'update_user',
        'roles' => ['Admin'],
    ]);

    Route::delete('bensms/user/{id}',[
        'uses' => 'UserRoleController@delete',
        'as' => 'delete_user',
        'roles' => ['Admin'],
    ]);
});





