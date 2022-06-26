<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //一行一行翻訳する
    
    //indexメソッド
    public function index(){ //topページに表示するもの全て
        $user = Auth::user();
        $lists = \DB::table('posts') //postsテーブル名 「;」までセット
        ->join('users', 'users.id', '=', 'posts.user_id') //usersテーブル繋げる、usersの中のidとpostsのidはイコール
        ->select('users.images', 'users.username', 'posts.post', 'posts.created_at', 'posts.id', 'posts.user_id') //topPに表示させる情報
        ->orderby('posts.created_at', 'DESC') //ツイート順
        ->get(); 

        return view('posts.index', [
            'user' => $user, 
            'lists' => $lists,
       
        ]);
        
    }
    

    public function create(Request $request){
        $validator = $request->validate([ // バリデーション
            'tweet' => ['required', 'string', 'max:150'], // 必須・文字であること・150文字まで
        ],
        [
            //'tweet' => '1文字以上150文字以内で入力してください',
        ]);
        $post = $request -> input('tweet'); //input('name属性')
        $user_id = Auth::user()->id; //ログインしているユーザーのIDを取得
        \DB::table('posts')->insert([ //データベースにデータ保存
            'post' => $post,
            'user_id' => $user_id
        ]);
        return redirect('/top'); //redirect()はフォーム送信などのPOST時に利用されます。
    }

    public function updateForm($id){  //編集
        $post = \DB::table('post')
        ->where('id', $id)
        ->first();
        return view('index', compact('post'));
    }

    public function update(Request $request){
        $id = $request->input('id'); //name属性が「upPost」「id」で指定されているフォームのテキストを別々の変数で取得
        $up_post = $request->input('upPost');
        \DB::table('posts') //postsテーブルのレコードをここで更新
        ->where('id', $id)
        ->update(
            ['post' => $up_post]
        );
        return back();
    }

    public function delete($id) //ツイート削除
    {
        
        \DB::table('posts')
        ->where('id', $id)
        ->delete();

        return redirect('/top'); //URL転送
    }

    
}

   

  ?>

