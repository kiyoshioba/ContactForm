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
//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');
// Route::get('/contact', 'ContactController@index')->name('contact.create');
// 投稿機能（試験的導入）
Route::POST('/contact/thanks', 'ContactController@store')->name('contact.store');
//確認ページ
// Route::post('/contact/confirm', 'ContactController@store')->name('contact.store');



//送信完了ページ
// Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');


