<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(User $user){
        $all_users=$user->getAllUsers(auth()->user()->id);

        return view('users.index',[
            'all_users' => $all_users
        ]);
    }

    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
