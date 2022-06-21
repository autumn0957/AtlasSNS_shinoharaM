<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    

    

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
       // dd();
        return Validator::make($data, [
            'username' => 'required|min:2|max:12',
            'mail' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|min:8|max:20|confirmed|string',
            'password_confirmation' => 'required'
        ],
        [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'username.max' => 'ユーザー名は2文字以上、12文字以下で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => '有効なEメールアドレスを入力してください',
            'mail.min' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.max' => 'メールアドレスは5文字以上、40文字以下で入力してください',
            'mail.unique:users' => 'このメールアドレスは既に使われています',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.max' => 'パスワードは8文字以上、20文字以下で入力してください',
            'password.confirmed' => '確認パスワードが一致していません',
            'password_confirmation.required' => '確認パスワードを入力してください',
            'password.alpha_num' => 'パスワードは半角数字で入力してください',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) //登録処理
    {
        //dd();
        return User::create([ //ユーザーテーブルに登録する
            'username' => $data['username'], //ユーザー名
            'mail' => $data['mail'], //メアド
            'password' => bcrypt($data['password']), //PW,bcrypt⇒ユーザーパスワードを保存するための安全なBcrypt
        ]);
       // $this->validator;
    }

    public function register(Request $request){ //登録とページの表示処理
        if($request->isMethod('post')){  //登録の処理
            //isMethod:現在のページが指定したHTTP動詞かどうかをチェックし、合っていればtrueを違う場合はfalseを返す
            $data = $request->input();
            $user = $request->input('username'); //addedに名前表示する為のコード
           // dd($user);
            $this->create($data);//データの保存 createメソッド呼び出し

            return view('auth.added')//特定のページへリダイレクト(URL転送)
            ->with([
                'user' => $user,
            ]);
        }


        return view('auth.register'); //登録がない場合の表示
    }



    public function added(){
        return view('auth.added');
    }
    //新規登録のための処理

}
