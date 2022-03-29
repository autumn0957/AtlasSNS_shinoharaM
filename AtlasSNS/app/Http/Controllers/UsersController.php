<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //一覧表
    public function index()
    {
        //
    }

    //新規ツイート入力画面
    public function create()
    {
        //
    }

    //新規ツイート投稿処理
    public function store(Request $request)
    {
        //
    }

    //ツイート詳細画面
    public function show($id)
    {
        //
    }

    //ツイート編集画面
    public function edit($id)
    {
        //
    }

    //ツイート編集処理
    public function update(Request $request,  $id)
    {
        //
    }

    //ツイート削除処理
    public function  destroy($id)
    {
        //
    }

    
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
}
