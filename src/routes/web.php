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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     echo 'Hello World!';
// });

// Route::get('/todo/create', function () {
//     return view('todo.create');
// })->name('todo.create');


//ToDo一覧画面表示用のルート追加。それに対応するControllerメソッドを用意
Route::get('/todo', 'TodoController@index')->name('todo.index');//get/リソースはリソースを複数取得
//作成画面表示用のルートを定義
Route::get('/todo/create', 'TodoController@create')->name('todo.create');//新規作成画面に遷移する時だけ
// 追加
Route::post('/todo', 'TodoController@store')->name('todo.store');//新規作成の時だけ通る
// 詳細画面用のルートを追加。{id}の部分はルートパラメータ（取得対象のToDoのIDを渡す）
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');

//編集画面用と更新処理用の2つのルートを作成
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');

// 削除用のルート用意する
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');