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

Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);

/**
 * Admin routes
 */

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['admin','auth']], function(){
    Route::group(['prefix'=>'users'], function(){
       Route::get('/', ['as'=>'users', 'uses'=>'UsersController@index']);
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

Route::model('order','App\Order');

Route::group(['prefix' => 'order','namespace'=>'Orders'], function()
{
    // Controllers Within The "App\Http\Controllers\Orders" Namespace
    Route::get('list', 'OrderController@index');
    Route::post('save',['as'=>'save-order','uses'=>'OrderController@store']);
    Route::get('confirm_order/{order}',['as'=>'confirm-order','uses'=>'OrderController@show']);

});


/**
 * Account Routes
 */
Route::model('user','App\User');

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
