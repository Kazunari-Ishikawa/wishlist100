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
Route::get('/', 'WishController@index')->name('index');
// マイページ、やりたいこと表示
Route::get('/mypage', 'WishController@show')->name('wish.show');
// マイページ、やったこと表示
Route::get('/mypage/done', 'WishController@done_show')->name('wish.done_show');
// 新規作成表示
Route::get('/mypage/new', 'WishController@new')->name('wish.new');
// やりたいこと編集表示
Route::get('/mypage/{id}/edit', 'WishController@edit')->name('wish.edit');
// アカウント設定表示
Route::get('/setting/account', 'SettingController@account')->name('setting.account');
// リスト設定表示
Route::get('/setting/list', 'SettingController@list')->name('setting.list');

// 新規作成機能
Route::post('/mypage', 'WishController@create')->name('wish.create');
// 編集機能
Route::post('/mypage/{id}', 'WishController@update')->name('wish.update');
// 削除機能
Route::post('/mypage/{id}/delete', 'WishController@destroy')->name('wish.destroy');
