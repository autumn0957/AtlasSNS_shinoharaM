<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function index(Request $request)
    {
                // ユーザー一覧をページネートで取得
        $users = User::paginate(20);

     // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = User::query();

        
    }
    

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    

    
}

