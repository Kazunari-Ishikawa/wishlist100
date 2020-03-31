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

// TOPページ
// Route::get('/', 'WishesController@index')->name('index');
Route::get('/', function(){
  $check = Auth::check();
  return view('index', ['loginState' => $check]);
});

Route::group(['middleware' => 'auth'], function(){
  // マイページ、やりたいこと表示
  Route::get('/mypage', 'WishesController@mypage')->name('wishes.mypage');
  // マイページ、やったこと表示
  Route::get('/mypage/done', 'WishesController@done_show')->name('wishes.done_show');
  // 新規作成表示
  Route::get('/mypage/new', 'WishesController@new')->name('wishes.new');
  // やりたいこと編集表示
  Route::get('/mypage/{id}/edit', 'WishesController@edit')->name('wishes.edit');
  // アカウント設定表示
  Route::get('/setting/account', 'SettingsController@account')->name('settings.account');
  // リスト設定表示
  Route::get('/setting/list', 'SettingsController@list')->name('settings.list');

  // 新規作成機能
  Route::post('/mypage', 'WishesController@create')->name('wishes.create');
  // 編集機能
  Route::post('/mypage/{id}', 'WishesController@update')->name('wishes.update');
  // Done機能
  Route::post('/mypage/{id}/done', 'WishesController@done');
  // Wish機能
  Route::post('/mypage/{id}/wish', 'WishesController@wish');
  // 削除機能
  Route::post('/mypage/{id}/delete', 'WishesController@destroy')->name('wishes.destroy');
  // Items取得機能
  Route::get('/mypage/fetch', 'WishesController@fetchItems');
});
