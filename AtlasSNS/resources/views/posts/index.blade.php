@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->

<body>
    <div class="wrapper">
        <form action="/top" method="post">{{--web.phpにいく--}}
            {{ csrf_field() }}
            <div style=" text-align: center;">
            
               <input type="text" name="tweet" placeholder="投稿内容を入力してください">
               <button type="submit">
                   <img src="images/post.png">
               </button>
            </div>
        </form>

        <div class="tweet-wrapper">{{--追記--}}
            @foreach ($users as $user) {{--$listsはポストコントローラーのクリエイトから--}}
            <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                <p>{{ $user->post }}</p>{{--投稿表示--}}
            </div>
            @endforeach
        </div>
    </div>
</body>




@endsection

