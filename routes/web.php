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
    return view('welcome');
});

Route::get('tests/test', 'TestController@index');

// RESTつかって色々やろうとしたときにいちいちcontact/indexみたいにcontactつけるのが冗長なので
// groupを使う
// Route::get('contact/index', 'ContactFormController@index');

Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
  Route::get('index', 'ContactFormController@index')->name('contact.index');
  // 名前を設定しておくと後でviewを書いていくときにとても便利なので基本的には設定しておくべき。
  Route::get('create', 'ContactFormController@create')->name('contact.create');
  Route::post('store', 'ContactFormController@store')->name('contact.store');
  Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');
  Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
  Route::post('update/{id}', 'ContactFormController@update')->name('contact.update');
  Route::post('destroy/{id}', 'ContactFormController@destroy')->name('contact.destroy');
});

//REST
// Route::resource('contact', 'ContactFormController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
