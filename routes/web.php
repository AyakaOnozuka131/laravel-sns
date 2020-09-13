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
Route::get('/', 'ArticleController@index');
// Route::getの第一引数には、URLを文字列で渡す
// 第二引数には、どのコントローラーで何のメソッドを実行するのかを文字列で渡す
// コントローラー名とメソッド名の間には@を入れる。
