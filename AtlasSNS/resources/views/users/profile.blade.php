@extends('layouts.login')

@section('content')
<form action="/top" method="post">
    @csrf
    <p>ID:{{ $user->id }}</p>
    <input type="hidden" name="id" value="{{ $user->id }}">
    <p>user name</p>
    <input type="text" name="name" value="{{ $user->username }}">
    <p>mail adress</p>
    <input type="text" name="mail" value="{{ $user->mail }}">
    <p>password</p>
    <input type="text" name="password" value="{{ $user->password }}">
    <p>password comfirm</p>
    <input type="text" name="password_comfirm" value="{{ $user->password }}">
    <p>bio</p>
    <input type="text" name=bio value="{{ $user->bio }}">
    <p>icon image</p>
    <input type="submit" name="icon_image">
    <input type="submit" value="更新">
</form>


@endsection