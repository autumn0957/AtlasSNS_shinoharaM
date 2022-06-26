<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; //後で復活させる
use Validator;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
   // protected $redirect = 'users.profile';

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            ->orderby('id', 'DESC')
            ->get();

            return view('users.search')
            ->with([
                'users' => $users,
                'keyword_name' => $keyword_name,
            ]);
        }
        
    }


       
    public function profile(){ 

  
        return view('users.profile');
    }
    
    public function profileup(Request $request){ //更新押したときにtopに戻るようにする
       // dd($request->input('username'));
    /*  $validator = Validator::make($request->all(),[
            'username'  => 'required|min:2|max:12',
            'mail' => ['required|email|min:5|max:40|unique:users', Rule::unique('users')->ignore(Auth::id())],
            //Rule::unique('users')->ignore(Auth::id())[>ignoreメソッドで、ログインしているユーザーのID以外をバリデーションで引っかかるように設定]
            'newpassword' => 'required|min:8|max:20|confirmed|string',
            'newpassword_confirmation' => 'required',
            'bio' => 'max:150',
            'iconimage' => 'image',
          ]); */
  
          $user = Auth::user(); //更新の処理(postのイメージ) ログインユーザー取得
          $id = Auth::id(); //ログインしているユーザーidの取得
          //画像登録
          $image = $request->file('iconimage')->store('public/images');
       //   $validator->validate();


          $user->username = $request->input('username');
          $user->mail = $request->input('mail');
          $user->password = bcrypt($request->input('newpassword'));
          $user->bio = $request->input('bio');
          $user->images = basename($image);
          \DB::table('users') //usersテーブルをここで更新
          ->where('id', $id)//これがないと全てのユーザー情報上書きされてしまう
          ->update([
              'username' => $user->username,
              'mail' => $user->mail,
              'password' => $user->password,
              'bio' => $user->bio,
          ]);
          

          return redirect('/top'); 
    }



   
 //   public function search(){
   //     return view('users.search');
    //}

    
//return viewのあとは、フォルダー名とblade名記述
    
}

