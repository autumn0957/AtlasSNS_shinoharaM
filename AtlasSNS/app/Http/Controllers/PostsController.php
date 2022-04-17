<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
//use DB;

class PostsController extends Controller
{
    //
    public function index(){
        $users = DB::table('users')->get();
        return view('posts.index', ['users' => $users]);
    }
}

   // public function index(){
    //   $users = DB::table('users')->get();
   //     return view('posts.index', ['users' => $users]);
  //  }