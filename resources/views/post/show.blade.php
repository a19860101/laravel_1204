@extends('template.master')

@section('page-title')
    QWERTY-{{$post->title}}
@endsection

@section('main')
<div class="container">
    <div class="row">
        <div class="mx-auto col-xl-8 col-sm-10 p-3">
            <h3>{{$post->title}}</h3>
            <div>作者:{{$post->user->name}}</div>
            <div>
                分類:
                <span class="badge bg-secondary">
                    <a href="{{route('post.category',['category'=>$post->category_id])}}" class="text-white">
                        {{$post->category->title}}
                    </a>
                </span>
            </div>
            <hr>
            <div class="mb-3">
                建立時間:{{$post->created_at}}
            </div>
            <hr>
            <div class="mb-3">
                {{$post->content}}
            </div>
            <hr>
            <div class="mb-3">
                最後更新時間:{{$post->updated_at}}
            </div>
            <hr>
            <a href="{{route('post.index')}}" class="btn btn-success ban-sm">文章列表</a>
            @if($post->user_id == Auth::id())
            <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary ban-sm">編輯文章</a>
            <form action="{{route('post.destroy',['id'=>$post->id])}}" method="post" class="d-inline-block">
                @csrf
                @method('delete')
                <input type="submit" value="刪除" onclick="return confirm('確認刪除？')" class="btn btn-danger ban-sm">
            </form>
            @endif
        </div>
    </div>
</div>

@endsection
