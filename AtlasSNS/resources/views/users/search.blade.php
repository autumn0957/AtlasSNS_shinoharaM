@extends('layouts.login')

@section('content')
<from class="mb-2 mt-4 text-conter" method="GET" action="{{ route('users.index') }}">
    <input class="from-control my-2 mr-5" type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div class="d-flex justify-content-conter">
        <button class="btn btn-info my-2" type="submit">検索</button>
        <button class="btn btn-secondary my-2 ml-5">
            <a href="{{ route('users.index') }}" class="text-white">クリア</a>
        </button>
    </div>
</from>

@foreach($users as $user)
<a href="{{ route('users.show', ['user => $user']) }}">
    {{ $user->username }}
</a>
@endforeach



@endsection