<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    
    
    //indexメソッド
    public function index(){ //ツイート表示コード追記
       $users = \DB::table('users')->get(); //usersテーブル名 全てのデータベース取得
        $lists = \DB::table('posts') //postsテーブル名
        ->where('users' , 'posts')
        ->get(); //joinとかwhere get前に入れる


       // $lists = List::with('user:id,name')->postsBy('id', 'asc');

        return view('posts.index', [
            'lists' => $lists, //18行目を一緒に持っていく
        ]);

       // return view('posts.index')
        //->with([
          //  'users'=>$users,
            //'lists' =>$lists,
        //]);
        //['users' => $users])
        //('posts.index', ['list'=>$list]);
        
    }
    

    public function create(Request $request){
        
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


    
}

   

  ?>

