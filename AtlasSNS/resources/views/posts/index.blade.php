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
    </div>
</body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($lists as $list) {{--$listsはポストコントローラーのクリエイトから--}}
            <div class="card">
                <div class="card-header p-3 w-100 d-flex">
                    
                    <div class="ml-2 d-flex flex-column">
                        
                        <p>{{ $list->post }}</p>
                        
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

