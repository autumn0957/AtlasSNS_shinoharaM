@extends('layouts.login')

@section('content')
<!--<h2>機能を実装していきましょう。</h2>-->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($users as $user) 
            <div class="card">
                <div class="card-header p-3 w-100 d-flex">
                    <img src="{{ $user->images }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">{{ $user->username }}</p><!--ユーザー表示させる-->
                        <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->username }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>

@endsection

