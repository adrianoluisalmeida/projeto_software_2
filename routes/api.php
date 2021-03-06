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

Route::post('users', 'Api\UserController@store');

Route::group(['middleware' => ['auth:api'], 'prefix' => 'users'], function () {
    Route::get('/', 'Api\UserController@index');
    Route::put('/', 'Api\UserController@update');
});


Route::group(['middleware' => ['auth:api'], 'prefix' => 'contacts'], function () {
 
    Route::get('/{id}', 'Api\ContactsController@get');
    Route::get('/user/all', 'Api\ContactsController@get_user');
    
    Route::post('/', 'Api\ContactsController@store');
    //Route::put('/{id}', 'Api\ContactsController@update');
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'notifications'], function () {
    Route::get('/{id}', 'Api\NotificationsController@get');
    Route::get('/user/all', 'Api\NotificationsController@get_user');
    Route::get('/user/status/{status}', 'Api\NotificationsController@getTotalNotifications');

    Route::post('/', 'Api\NotificationsController@store');
    Route::put('/{id}', 'Api\NotificationsController@update');

});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'reports'], function () {
    Route::get('/', 'Api\ReportsController@index');
    Route::get('/{id}', 'Api\ReportsController@index');
    Route::get('/entity/{id}', 'Api\ReportsController@indexEntity');

    Route::post('/', 'Api\ReportsController@store');
    Route::put('/{id}', 'Api\ReportsController@update');


    Route::post('/react', 'Api\ReportsController@postReact');
    Route::get('/react/{report_id}/total', 'Api\ReportsController@getReactTotal');
    Route::get('/react/{report_id}', 'Api\ReportsController@getReact');


    Route::put('/react/{react_id}', 'Api\ReportsController@updateReact');
    Route::delete('/react/{react_id}', 'Api\ReportsController@destroyReact');

    Route::get('/{id}/status', 'Api\ReportsController@status');

});


Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['prefix' => 'entities'], function () {
        Route::get('/{city?}', 'Api\EntitiesController@index');
    });

    Route::group(['prefix' => 'states'], function () {
        Route::get('/', 'Api\EntitiesController@states');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Api\CategoriesController@index');
    });


});