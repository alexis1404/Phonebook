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

Route::get('/', 'MainTelephoneController@index')->name('home');

Route::post('user_create', 'MainTelephoneController@createUser')->name('user_create');

Route::get('user_delete/{user_id}', 'MainTelephoneController@user_delete')->name('user_delete');

Route::get('user_edit_page/{user_id}', 'MainTelephoneController@userEditPage')->name('user_edit_page');

Route::post('user_edit/{user_id}', 'MainTelephoneController@editUser')->name('user_edit');

Route::get('user_phones/{user_id}', 'MainTelephoneController@userPhones')->name('user_phones');

Route::post('add_phone/{user_id}', 'MainTelephoneController@addPhone')->name('add_phone');

Route::get('phone_delete/{phone_id}', 'MainTelephoneController@phone_delete')->name('phone_delete');

Route::get('phone_edit_page/{phone_id}', 'MainTelephoneController@editPhonePage')->name('phone_edit_page');

Route::post('phone_edit/{phone_id}', 'MainTelephoneController@editPhone')->name('phone_edit');


