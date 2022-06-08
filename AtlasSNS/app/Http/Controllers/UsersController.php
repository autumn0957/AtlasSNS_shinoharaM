<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function index(){ //indexメソッドでseachページに飛ぶ
        $users = User::all(); //ユーザー取得
       // $search = $request->input('search'); //入力された値を取得
        return view('users.search')
        ->with('users', $users); 
    }

    

    public function search(Request $request){
        $keyword_name = $request->search;

        if(!empty($keyword_name)){
            $query = User::query();
            $users = $query
            ->where('username', 'like', '%' .$keyword_name. '%') 
            //where('カラム名',  like '%検索ワード%')
            ->get();
           // $message = "「".$keyword_name."」を含む名前の検索が完了しました。";

            return view('users.search')
            ->with([
                'users' => $users,
               // 'message' => $message,
            ]);
        }
        else{
            $message = "検索結果はありません。";
            return view('users.search')
            ->with('message', $message);
        }
    }
    


    public function profile(){
        return view('users.profile');
    }
 //   public function search(){
   //     return view('users.search');
    //}

    
//return viewのあとは、フォルダー名とblade名記述
    
}

