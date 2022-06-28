@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->

<body>
    <div class="wrapper">
        <form action="/top" method="post">{{--web.phpにいく--}}
        @if($errors->first('tweet')) <!-- 追加 -->
                    <p style="color: red; ">※{{$errors->first('tweet')}}</p>
                @endif
            {{ csrf_field() }}
            <div class="post-text">
            <img src="{{ asset('storage/images/'.$user->images) }}"> {{--14,15代入 15は画像名表示されている dawn.pngを適当に作る（1つの手）--}}
            
               <input type="text" name="tweet" placeholder="投稿内容を入力してください">
               <button type="submit" class="btn-tweet" >
                   <img src="images/post.png">
               </button>
            </div>
            
        </form>

        <div class="tweet-wrapper">{{--追記--}}
            @foreach ($lists as $lists) {{--$listsはポストコントローラーのクリエイトから--}}
            <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
            <tr>
              <td><img src="{{ asset('storage/images/'.$user->images) }}" class="rounded-circle" width="50" height="50"></td>{{--アイコン表示--}}
              <td>{{ $lists->username }}</td>{{--ユーザー名表示--}}
              <td>{{ $lists->post }}</td>{{--投稿表示--}} 
              <td>{{ $lists->created_at }}</td>{{--投稿日時表示--}}

             
              @if (Auth::user()->id == $lists->user_id) 
              <td>{{--<a class="btn btn-primary" href="/post/{{$list->id}}">--}}
                  <img src="images/edit.png" width="40" height="40"></td>{{--ツイート編集、アイコンのみ入れたのでのちほど編集--}}
              <td><a class="btn btn-danger" href="/post/{{$lists->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                 <img src="images/trash-h.png" width="60" height="60"></a></td>{{--ツイート削除--}}
              @endif
            </tr>
            </div>
            @endforeach
        </div>
    </div>
</body>




@endsection

