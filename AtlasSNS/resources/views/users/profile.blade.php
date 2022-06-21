@extends('layouts.login')

@section('content')
<div class="profile">
<img src="{{ asset('storage/images/' .auth()->user()->images) }}">

<form action="{{ url('profileup') }}" enctype="multipart/form-data" method="post">{{--profileupのpostに飛ぶ--}}
  @csrf
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
   @endif
  <dl class="UserProfile">
    <dt>username</dt>
    <dd><input type="text" name="username" value="{{ Auth::user()->username }}"></dd>
    <dt>mail address</dt>
    <dd><input type="text" name="mail" value="{{ Auth::user()->mail }}"></dd>
    <dt>password</dt>
    <dd><input type="password" name="newpassword"></dd>
    <dt>password confirm</dt>
    <dd><input type="password" name="newpassword_confirmation"></dd>
    <dt>bio</dt>
    <dd><input type="text" name="bio" value="{{ Auth::user()->bio }}"></dd>
    <dt>icon image</dt>
    <dd><input type="file" name="iconimage"></dd>
  </dl>
  <input type="submit" name="profileupdate" value="更新" >
</form>
</div>

@endsection