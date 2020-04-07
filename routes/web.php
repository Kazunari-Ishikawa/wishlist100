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
// 本番環境のみの設定
if(app()->environment('production')) {
  URL::forceScheme('https');
}

Auth::routes();

// TOPページ
Route::get('/', 'WishesController@index')->name('index');

// 使い方ページ
Route::get('use', 'WishesController@use')->name('use');

Route::group(['middleware' => 'auth'], function(){
  // マイページ、リスト表示
  Route::get('/mypage', 'WishesController@mypage')->name('wishes.mypage');
  // アカウント設定表示
  Route::get('/settings/account', 'SettingsController@account')->name('settings.account');
  // リスト設定表示
  Route::get('/settings/list', 'SettingsController@list')->name('settings.list');

  // 新規作成機能
  Route::post('/mypage', 'WishesController@create')->name('wishes.create');
  // 編集機能
  Route::post('/mypage/{id}', 'WishesController@update')->name('wishes.update');
  // Done機能
  Route::post('/mypage/{id}/done', 'WishesController@done')->name('wishes.done');
  // Wish機能
  Route::post('/mypage/{id}/wish', 'WishesController@wish')->name('wishes.wish');
  // 削除機能
  Route::post('/mypage/{id}/delete', 'WishesController@destroy')->name('wishes.destroy');
  // Items取得機能
  Route::get('/mypage/fetch', 'WishesController@fetchItems')->name('wishes.fetch');

  // アカウント変更機能
  Route::post('settings/account/{id}', 'SettingsController@update')->name('account.update');
  // パスワード変更機能
  Route::post('settings/account/{id}/pass', 'SettingsController@change_pass')->name('account.password');
  // アカウント退会機能
  Route::post('settings/account/{id}/delete', 'SettingsController@withdraw')->name('account.withdraw');

});
