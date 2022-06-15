@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{ $user }}さん</p> {{--Contlloreでusername 1つだけ引っ張り出してるので「->」不要--}}
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection