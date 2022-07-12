<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; //後で復活させる
use Illuminate\Support\Facades\Validator;
//use Validator;

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
       if($request->isMethod('post')){
       $rulus =[
            'username'  => 'required|min:2|max:12',
            'mail' => ['required|email:strict,dns,spoof|min:5|max:40|unique:users', Rule::unique('users')->ignore(Auth::id())],
            //メモ:Rule::unique('users')->ignore(Auth::id())[>ignoreメソッドで、ログインしているユーザーのID以外をバリデーションで引っかかるように設定]
            'newpassword' => 'required|min:8|max:20|confirmed|string',
            'newpassword_confirmation' => 'required|same:newpassword',
            'bio' => 'max:150',
            'iconimage' => 'image',
          ]; //バリデパスワード必須にする(一致するようにする)

          $message = [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なEメールアドレスを入力してください',
            'mail.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.unique:users' => 'このメールアドレスは既に使われています',
            'newpassword.required' => 'パスワードを入力してください',
            'newpassword.min' => 'パスワードは8文字以上、20文字以下で入力してください',
            'newpassword.max' => 'パスワードは8文字以上、20文字以下で入力してください',
            'newpassword.confirmed' => '確認パスワードが一致していません',
            'newpassword_confirmation.required' => '確認パスワードを入力してください',
            'newpassword.alpha_num' => 'パスワードは半角数字で入力してください',
        ];

        $validator = Validator::make($request->all(), $rulus, $message);
    
            if($validator->fails()){ //ここがエラーでる
                return redirect('/')
                ->withErrors($validator)
                ->withInput();
            }

        /*  if($validator->fails()){
            $validator->errors()->add('newpassword', __('The current newpassword_confirmation is incorrect.'));
            withErrors($validator) ->withInput();
          } */
  
          $user = Auth::user(); //更新の処理(postのイメージ) ログインユーザー取得
          $id = Auth::id(); //ログインしているユーザーidの取得
          $validator->validate(); //この後に必要な記述あり(if文)バリデが引っかかったとき(必須入力がなかった場合など)
          
          

          //画像登録 if文で画像必須をなくす なければそのままに
        //  $image = $request->file('iconimage')->store('public/images');

          $user->username = $request->input('username');
          $user->mail = $request->input('mail');
          $user->password = bcrypt($request->input('newpassword'));
          $user->bio = $request->input('bio');
        //  $user->images = basename($image);
          \DB::table('users') //usersテーブルをここで更新
          ->where('id', $id)//これがないと全てのユーザー情報上書きされてしまう
          ->update([
              'username' => $user->username,
              'mail' => $user->mail,
              'password' => $user->password,
              'bio' => $user->bio,
          //    'images' => $user->images,
          ]);
          
        }

          return redirect('/top'); 
          
    }

    public function follow(Request $request){
        Users::firstOrCreate([
            'followed_id' => $request->post_user,
            'following_id' => $request->auth_user
        ]);
        return true;
    }

    public function unfollow(Request $request){
        $follow = Users::where('followed_id', $request->post_user)
        ->where('following_id', $request->auth_user)
        ->first();
        if($follow){
            $follow->delete();
            return false;
        }
    } 



   
 //   public function search(){
   //     return view('users.search');
    //}

    
//return viewのあとは、フォルダー名とblade名記述
    
}

