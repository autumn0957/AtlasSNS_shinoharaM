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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
Route::get('/logout', 'Auth\LoginController@getLogout');//ログアウト押したときの処理

//Route::post('/resister', 'Auth\RegisterController@validator');


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');//ログイン画面

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');//新規登録

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');//新規登録後画面


//ログイン中のページ
Route::get('/top','PostsController@index');//ホーム
Route::get('/profile','UsersController@profile');//プロフィール

Route::get('/search','UsersController@index');//検索
Route::get('/follow-list','PostsController@index');//フォローリスト
Route::get('/follower-list','PostsController@index');//フォロワーリスト




//Route::get or post('URL', 'Controller名@繋げたいメソッド');
//投稿ページに飛ぶ
//ルートの後はget or POST　その後行先URL　更にその後にController@の後はメソッド(関数)

//次の飛ぶ場所や、動かしたい機能を選択するページ⇒web.php