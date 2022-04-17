<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   // public function index(/*User $user*/){
        /*$all_users=$user->getAllUsers(auth()->user()->id); //userテーブルから各コードから取り出す

        return view('users.index',[
            'all_users' => $all_users
        ]);*/
       /* $users = User::all();*/

       //
    //   $users = DB::table('users')->get();
   //     return view('posts.index', ['users' => $users]);
  //  }

/*    public function getAllUsers(Int $user_id)
    {
        return $this->where('id', '<>', $user_id)->paginate(5);
    }*/

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}

