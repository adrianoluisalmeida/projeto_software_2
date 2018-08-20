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

Route::get('a-triunfo', 'HomeController@about');

Auth::routes();

Route::group(['middleware' => ['auth', 'needsRole', 'authorize'], 'is' => 'admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'Admin\HomeController@index');
    Route::get('/home', 'Admin\HomeController@index');


    //Roles Routes
    Route::group(['prefix' => 'roles'], function(){
        Route::get('/', ['uses' => 'Admin\RolesController@index', 'as' => 'roles.index']);
        Route::get('/create', ['uses'=> 'Admin\RolesController@create', 'as' => 'roles.create']);
        Route::get('{id}/edit', ['uses'=> 'Admin\RolesController@edit', 'as' => 'roles.edit']);
        Route::get('{id}/remove', ['uses' => 'Admin\RolesController@destroy', 'as' => 'roles.remove']);

        Route::post('/', 'Admin\RolesController@store');
        Route::put('/{id}', 'Admin\RolesController@update');
    });

    //Permissions Routes
    Route::group(['prefix' => 'permissions'], function(){
        Route::get('/', ['uses' => 'Admin\PermissionsController@index', 'as' => 'permissions.index']);
        Route::get('/create', ['uses'=> 'Admin\PermissionsController@create', 'as' => 'permissions.create']);
        Route::get('{id}/edit', ['uses'=> 'Admin\PermissionsController@edit', 'as' => 'permissions.edit']);
        Route::get('{id}/remove', ['uses' => 'Admin\PermissionsController@destroy', 'as' => 'permissions.remove']);

        Route::post('/', 'Admin\PermissionsController@store');
        Route::put('/{id}', 'Admin\PermissionsController@update');


        // Permissions Roles Routes
        Route::group(['prefix' => 'roles'], function(){
            Route::get('/', ['uses' => 'Admin\PermissionsRolesController@index', 'as' => 'permissions.roles.index']);
            Route::post('/', 'Admin\PermissionsRolesController@store');
        });

    });

    //Users Routes
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', ['uses' => 'Admin\UsersController@index', 'as' => 'users.index']);
        Route::get('/my', ['uses' => 'Admin\UsersController@my', 'as' => 'users.my']);
        Route::get('/create', ['uses'=> 'Admin\UsersController@create', 'as' => 'users.create']);
        Route::get('{id}/edit', ['uses'=> 'Admin\UsersController@edit', 'as' => 'users.edit']);
        Route::get('{id}', ['uses' => 'Admin\UsersController@destroy', 'as' => 'users.remove']);

        Route::post('/', 'Admin\UsersController@store');
        Route::put('/{id}', 'Admin\UsersController@update');
        Route::put('/my/{id}', 'Admin\UsersController@updateMy');
    });


});

