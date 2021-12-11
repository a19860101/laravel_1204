@extends('template.master')

@section('page-title')
QWERTY
@endsection

@section('main')
    <h1>文章列表</h1>
    @foreach($posts as $post)
    <div>
        {{$post->title}}
    </div>
    <div>
        {{$post->content}}
    </div>
    <div>
        {{$post->created_at}}
    </div>
    <a href="{{route('post.show',['id'=>$post->id])}}">繼續閱讀</a>
    <hr>
    @endforeach
@endsection
