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

Route::group(['middleware' => 'auth'], function(){
  // マイページ、リスト表示
  Route::get('/mypage', 'WishesController@mypage')->name('wishes.mypage');
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

  // 準備中
  Route::get('/settings', 'SettingsController@preparing');
});
