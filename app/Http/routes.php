<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'WelcomeController@index');

Route::get('email', function(){
   return view('emails.confirmation',['order'=>\App\Order::find(1)]);
});
Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);
Route::get('search', ['as'=>'search','uses'=>'HomeController@search']);


/**
 * Route model binding
 */
Route::model('user','App\User');
Route::model('order','App\Order');
Route::model('status','App\Status');
Route::model('type','App\Type   ');

/**
 * Admin routes
 */

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['admin']], function(){

    Route::get('/', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);
    Route::resource('settings', 'SettingsController', ['only' => ['index', 'store'], 'names' => ['index'=>'settings','store'=>'settings.store']]);

    Route::get('status', ['as'=>'status', 'uses'=>'StatusController@index']);
    Route::post('status', ['as'=>'status', 'uses'=>'StatusController@create']);
    Route::post('status/edit', ['as'=>'edit-status', 'uses'=>'StatusController@edit']);
    Route::get('status/{status}/delete', ['as'=>'delete-status', 'uses'=>'StatusController@destroy']);

    Route::get('types', ['as'=>'types', 'uses'=>'TypesController@index']);
    Route::post('types', ['as'=>'types', 'uses'=>'TypesController@create']);
    Route::post('type/edit', ['as'=>'edit-type', 'uses'=>'TypesController@edit']);
    Route::get('type/{type}/delete', ['as'=>'delete-type', 'uses'=>'TypesController@destroy']);

    Route::group(['prefix'=>'users'], function(){
        Route::get('/', ['as'=>'users', 'uses'=>'UsersController@index']);
        Route::any('/add', ['uses'=>'UsersController@create']);
        Route::any('{user}/edit', ['as'=>'edit-user','uses'=>'UsersController@edit']);
        Route::any('{user}/view', ['as'=>'view-user','uses'=>'UsersController@show']);
        Route::get('{user}/delete', ['as'=>'delete-user','uses'=>'UsersController@destroy']);
    });
    Route::group(['prefix'=>'orders'], function(){
        Route::get('/', ['as'=>'orders', 'uses'=>'OrderController@index']);
        Route::any('/add', ['uses'=>'OrderController@create']);
        Route::any('{order}/edit', ['as'=>'edit-order','uses'=>'OrderController@edit']);
        Route::get('{order}/update', ['as'=>'update-order','uses'=>'OrderController@edit']);
        Route::post('{order}/update', ['uses'=>'OrderController@update']);
        Route::any('{order}/view', ['as'=>'view-order','uses'=>'OrderController@show']);
        Route::get('{order}/delete', ['as'=>'delete-order','uses'=>'OrderController@destroy']);
    });
});

/**
 * Route to perform image manipulation
 */
Route::group(['prefix'=>'image'], function(){
    Route::post('upload',['as'=>'image-upload','uses'=>'HomeController@postImages']);
    Route::post('delete',['as'=>'image-delete','uses'=>'HomeController@postDeleteImage']);
});


/**
 * Order routes with route-Order model binding
 */

Route::group(['prefix' => 'order','namespace'=>'Orders'], function()
{
    // Controllers Within The "App\Http\Controllers\Orders" Namespace
    Route::get('list', 'OrderController@index');
    Route::post('save',['as'=>'save-order','uses'=>'OrderController@store']);
    Route::get('confirm_order/{order}',['as'=>'confirm-order','uses'=>'OrderController@show']);
    Route::get('confirm/{order}',['as'=>'cod-order','uses'=>'OrderController@create']);
    Route::get('{order}/{order_number}', ['as'=>'review-order','uses'=>'OrderController@view']);

});


/**
 * Account Routes
 */

Route::group(['prefix'=>'account','namespace'=>'Account'], function(){

    Route::get('{username}', ['as'=>'profile','uses'=>'AccountController@index']);
    Route::get('{username}/edit/', ['as'=>'account','uses'=>'AccountController@edit']);
    Route::post('{username}/edit/', ['uses'=>'AccountController@update']);
    Route::get('{username}/change_password/', ['as'=>'change_password','uses'=>'AccountController@change_password']);
    Route::post('{username}/change_password/', ['uses'=>'AccountController@update_password']);

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
