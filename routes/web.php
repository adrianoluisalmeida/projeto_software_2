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

Route::get('/', function(){
    return view('home');
});

Route::get('/admin', ['uses' => 'HomeController@index', 'as' => 'home']);


Route::get('/quem-somos', ['uses' => 'HomeController@about', 'as' => 'about']);
Route::get('/testes', ['uses' => 'HomeController@tests', 'as' => 'teste']);

Auth::routes();

Route::group(['middleware' => ['auth', 'authorize'], 'prefix' => 'admin'], function(){
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

    Route::group(['prefix' => 'entities'], function() {

        Route::get('/', ['uses' => 'Admin\EntitiesController@index', 'as' => 'entities.index']);
        Route::get('/create', ['uses' => 'Admin\EntitiesController@create', 'as' => 'entities.create']);
        Route::get('{id}/edit', ['uses' => 'Admin\EntitiesController@edit', 'as' => 'entities.edit']);
//        Route::get('{id}', ['uses' => 'Admin\EntitiesController@destroy', 'as' => 'entities.remove']);
        Route::get('{id}/remove', ['uses' => 'Admin\EntitiesController@destroy', 'as' => 'entities.remove']);

        Route::post('/', 'Admin\EntitiesController@store');
        Route::put('/{id}', 'Admin\EntitiesController@update');
    });

    Route::group(['prefix' => 'categories'], function() {

        Route::get('/', ['uses' => 'Admin\CategoriesController@index', 'as' => 'categories.index']);
        Route::get('/create', ['uses' => 'Admin\CategoriesController@create', 'as' => 'categories.create']);
        Route::get('{id}/edit', ['uses' => 'Admin\CategoriesController@edit', 'as' => 'categories.edit']);
        Route::get('{id}/remove', ['uses' => 'Admin\CategoriesController@destroy', 'as' => 'categories.remove']);

        Route::post('/', 'Admin\CategoriesController@store');
        Route::put('/{id}', 'Admin\CategoriesController@update');
    });

    Route::group(['prefix' => 'reports'], function() {

        Route::get('/', ['uses' => 'Admin\ReportsController@index', 'as' => 'reports.index']);
        Route::get('/create', ['uses' => 'Admin\ReportsController@create', 'as' => 'reports.create']);
        Route::get('{id}/edit', ['uses' => 'Admin\ReportsController@edit', 'as' => 'reports.edit']);
        Route::get('{id}/remove', ['uses' => 'Admin\ReportsController@destroy', 'as' => 'reports.remove']);
        Route::get('{id}/view', ['uses' => 'Admin\ReportsController@show', 'as' => 'reports.view']);

        Route::post('/', 'Admin\ReportsController@store');
        Route::put('/{id}', 'Admin\ReportsController@update');

        Route::post('/status-update', 'Admin\ReportsController@updateStatus');
    });

    Route::group(['prefix' => 'contacts'], function() {

        Route::get('/', ['uses' => 'Admin\ContactsController@index', 'as' => 'contacts.index']);
        Route::get('/create', ['uses' => 'Admin\ContactsController@create', 'as' => 'contacts.create']);
        Route::get('{id}/edit', ['uses' => 'Admin\ContactsController@edit', 'as' => 'contacts.edit']);
        Route::get('{id}/remove', ['uses' => 'Admin\ContactsController@destroy', 'as' => 'contacts.remove']);
        Route::get('{id}/view', ['uses' => 'Admin\ContactsController@show', 'as' => 'contacts.view']);

        Route::post('/', 'Admin\ContactsController@store');
        Route::put('/{id}', 'Admin\ContactsController@update');

        Route::post('/status-update', 'Admin\ContactsController@updateStatus');
    });


});

