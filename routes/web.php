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
//トップ画面（現時点では未実装）
// Route::get('index', 'ContactController@index');
//入力ページ
Route::get('contact/create', 'ContactController@create');
//確認＆投稿ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
// Route::get('/contact', 'ContactController@index')->name('contact.create');
//完了ページ
Route::POST('/contact/thanks', 'ContactController@store')->name('contact.store');

//問い合わせ一覧表示画面
Route::get('/contact/Board','ContactController@board')->name('contact.board');
