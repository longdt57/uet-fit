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

Route::get('/','MyHomeController@index');
Route::get('/home/search','MyHomeController@search');
Route::get('/search/tatca','MyHomeController@search_tatca');
Route::get('/search/profiles','MyHomeController@search_profiles');
Route::get('/search/detai','MyHomeController@search_detai');
Route::get('/search/phatminh','MyHomeController@search_phatminh');
Route::get('/search/sanpham','MyHomeController@search_sanpham');
Route::get('/search/doanhnghiep','MyHomeController@search_doanhnghiep');


Auth::routes();
Route::group(['middleware' => 'checkeditableIsAdmin'], function () {
	Route::get('/accounts-manager','MyHomeController@accounts');
	Route::get('/accounts-save','MyHomeController@accounts_save');

});


Route::get('/home', 'MyHomeController@index');
Route::get('/profiles/{profile}',"ProfileController@detail");
Route::get('/detai/{detai}','DetaiController@detail');
Route::get('/phatminh/{phatminh}','PhatminhController@detail');
Route::get('/sanpham/{sanpham}','SanphamController@detail');
Route::get('/doanhnghiep/{doanhnghiep}','DoanhnghiepController@detail');
Route::get('/home2','HomeController@index');

Route::get('/profiles-create','ProfileController@create');
Route::get('/detai-create','DetaiController@create');
Route::get('/phatminh-create','PhatminhController@create');
Route::get('/sanpham-create','SanphamController@create');
Route::get('/doanhnghiep-create','DoanhnghiepController@create');

Route::group(['middleware' => 'checkcreateable'], function () {
  Route::post('/profiles-store','ProfileController@store');
	Route::post('/detai-store','DetaiController@store');
	Route::post('/phatminh-store','PhatminhController@store');
	Route::post('/sanpham-store','SanphamController@store');
	Route::post('/doanhnghiep-store','DoanhnghiepController@store');

});

Route::group(['middleware' => 'checkeditable'], function () {
	Route::get('/profiles_edit/{profile}','ProfileController@edit');
  Route::get('/detai_edit/{detai}','DetaiController@edit');
  Route::get('/phatminh_edit/{phatminh}','PhatminhController@edit');
  Route::get('/sanpham_edit/{sanpham}','SanphamController@edit');
  Route::get('/doanhnghiep_edit/{doanhnghiep}','DoanhnghiepController@edit');

  Route::get('/profiles_update','ProfileController@update');
	Route::get('/detai_update','DetaiController@update');
	Route::get('/phatminh_update','PhatminhController@update');
	Route::post('/sanpham_update','SanphamController@update');
	Route::get('/doanhnghiep_update','DoanhnghiepController@update');
});
