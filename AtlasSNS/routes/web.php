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
Route::get('/login', 'Auth\LoginController@login')->name('login'); //name以降ミドルウェア処理
Route::post('/login', 'Auth\LoginController@login');//ログイン画面

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');//新規登録

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');//新規登録後画面


//ログイン中のページ
Route::get('/profile','UsersController@profile');//プロフィール画面を表示させる
Route::post('/profileup','UsersController@profileup');//プロフィール更新押したあとの処理


Route::get('/followList','FollowsController@followList');//フォローリスト
Route::get('/followerList','FollowsController@followerList');//フォロワーリスト

//FF機能
Route::post('/search/{id}/follow', 'UsersController@follow')->name('follow');
Route::post('/search/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

//投稿
Route::get('/top','PostsController@index');//ホーム表示データ取得（投稿）
Route::post('/top', 'PostsController@create'); //新規ツイートをデータベースに保存
Route::get('{id}/top', 'PostsController@updateForm');//編集
// Route::post('/top', 'PostsController@update');//更新
Route::get('/post/{id}/delete', 'PostsController@delete'); //削除

//検索ページ
Route::get('/search','UsersController@index');//検索画面表示
Route::post('/search', 'UsersController@search'); //検索機能 




//Route::get or post('URL', 'Controller名@繋げたいメソッド');
//投稿ページに飛ぶ
//ルートの後はget or POST　その後行先URL　更にその後にController@の後はメソッド(関数)

//次の飛ぶ場所や、動かしたい機能を選択するページ⇒web.php