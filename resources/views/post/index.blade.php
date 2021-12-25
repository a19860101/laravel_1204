@extends('template.master')

@section('page-title')
QWERTY
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="mx-auto col-xl-8 col-sm-10 ">
                <h2>文章列表</h2>
                <div>{{Auth::id()}}</div>
                <div>{{Auth::user()->name}}</div>
            </div>
            @foreach($posts as $post)
            <div class="mx-auto col-xl-8 col-sm-10 p-3">
                <div class="border p-3 rounded shadow-sm">
                    <h3>{{$post->title}}</h3>
                    <div class="mb-3">
                        建立時間:{{$post->created_at}}
                    </div>
                    <div>
                        分類:
                        <span class="badge bg-secondary">
                            <a href="{{route('post.category',['category'=>$post->category_id])}}" class="text-white">
                                {{$post->category->title}}
                            </a>
                        </span>
                    </div>
                    <div class="mb-3">
                        {{Str::limit($post->content,100)}}
                    </div>
                    <div class="mb-3">
                        最後更新時間:{{$post->updated_at}}
                    </div>
                    <a href="{{route('post.show',['id'=>$post->id])}}" class="btn btn-primary btn-sm">繼續閱讀</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
