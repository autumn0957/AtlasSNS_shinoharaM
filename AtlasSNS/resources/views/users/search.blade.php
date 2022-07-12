@extends('layouts.login')

@section('content')
<form method="POST" action="/search">
    {{ csrf_field() }}
    <div class="d-flex justify-content-conter">
    <div class="post-text-search">
        <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="search">
    
        <button type="submit">検索</button>
        @if(!empty($keyword_name))
           <div class="alert alert-primary" role="alert">検索ワード：{{ $keyword_name }}</div> {{--検索ワード表示--}}
        @endif
    </div>
    
    </div>
    
</form>


<div class="search-wrapper">
@foreach($users as $user)


    <p>{{ $user->username }}</p>

    <div class="d-flex justify-content-end flex-grow-1">
        @if (in_array($user->id, Auth::user()->follow_each()))
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            
            <button type="submit" class="btn btn-primary">フォローする</button>
        </form>

        @endif
    </div>

@endforeach
</div>





@endsection