@extends('layouts.login')

@section('content')
<form method="POST" action="/search">
    {{ csrf_field() }}
    <div class="d-flex justify-content-conter">
    <div class="post-text-search">
        <input type="text" class="form-control col-md-5" placeholder="ユーザー名" name="search">
    
        <button type="submit">検索</button>
        @if(!empty($message))
           <div class="alert alert-primary" role="alert">{{ $message }}</div> {{--検索ワード表示--}}
        @endif
    </div>
    
    </div>
    
</form>


<div class="search-wrapper">
@foreach($users as $user)

    <p>{{ $user->username }}</p>

@endforeach
</div>





@endsection