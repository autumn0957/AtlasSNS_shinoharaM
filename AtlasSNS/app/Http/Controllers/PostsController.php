<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;

class PostsController extends Controller
{
    
    
    //
    public function index(){
        $users = \DB::table('users')->get();
        return view('posts.index', ['users' => $users]);
    }

    // ツイート表示
    public function create(){
        $users = auth()->users();
        return view('create',[
            'users' => $users
        ]);
    }


    
}

   

  ?>

