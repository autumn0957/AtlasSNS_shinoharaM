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

@if (in_array($user->id, Auth::user()->follow_each()))
@endif 

    <p>{{ $user->username }}</p>

@endforeach
</div>





@endsection