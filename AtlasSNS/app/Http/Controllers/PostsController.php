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
    public function index(){
        $users = \DB::table('users')->get();
        return view('posts.index', ['users' => $users]);
        
    }
    

    public function create(Request $request){
        
        $post = $request -> input('tweet');
        $user_id = Auth::user()->id; //ログインしているユーザーのIDを取得
        \DB::table('posts')->insert([ //データベースにデータ保存
            'post' => $post,
            'user_id' => $user_id
        ]);
        return back();
    }

    public function updateForm($id){
        $post = \DB::table('post')
        ->where('id', $id)
        ->first();
        return view('index', compact('post'));
    }


    
}

   

  ?>

