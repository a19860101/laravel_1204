@extends('template.master')
@section('page-title')
QWERTY
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>
                    <a href="{{route('post.index')}}" class='btn btn-primary'>文章列表</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
