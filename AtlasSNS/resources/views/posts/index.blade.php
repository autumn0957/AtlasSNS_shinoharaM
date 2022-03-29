@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->

<div class="sontainer">
    <div class="row justify-content-conter">
        <div class="col-md-8">
            @foreach ($all_users as $user)
            <div class="card">
                <div class="card-header p-3 w-100 d-flex">
                    <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">{{ $user->name }}</p>
                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection