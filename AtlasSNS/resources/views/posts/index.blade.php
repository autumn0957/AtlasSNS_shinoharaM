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
                        <!--user_id⇒誰の投稿か-->
                    </div>
                    {{-- FFコード、あとまわし @if (auth()->user()->followUsers($user->id))
                    <div class="px-2">
                        <span class="px-1 bg-secondary text-ligt">フォローされています</span>
                    </div>
                    @endif
                    <div class="d-flex justify-content-end flex-grow-1">
                        @if (auth()->user()->Follows($user->id))
                        <from action="{{ route('followUsers', ['id' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">フォロー解除</button>
                        </from>
                        @else
                        <from action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">フォローする</button>
                        </from>
                        @endif
                    </div>--}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

