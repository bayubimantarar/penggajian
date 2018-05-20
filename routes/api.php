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


Route::group(['prefix' => 'karyawan'], function(){
	Route::post('login', 'Api\KaryawanController@login');

	Route::group(['middleware' => ['jwt.auth']], function(){
		Route::get('checktoken/{token}', 'Api\KaryawanController@checktoken');
		Route::get('getslipgaji/{token}/{id}', 'Api\KaryawanController@getslipgaji');
		Route::get('downloadslipgaji/{token}/{id}', 'Api\KaryawanController@exportpdfbyid');
		Route::post('logout', 'Api\KaryawanController@logout');
		Route::post('changeprofile', 'Api\KaryawanController@changeprofile');
	});
});
