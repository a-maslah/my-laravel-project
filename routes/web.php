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


Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::get('index','PasportController@index');
Route::get('create','PasportController@create');
Route::get('edit/{id}','PasportController@edit');
Route::post('store','PasportController@store');
Route::put('update','PasportController@update');
Route::delete('delete/{id}','PasportController@destroy');*/
route::resource('pasports','PasportController');
route::get('send/{id}','EmailController@send_email');
route::post('send_all','EmailController@send_email_to_all');
route::post('search','PasportController@search');
route::get('rec','PasportController@recouver_emails');




