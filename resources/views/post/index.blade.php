@extends('template.master')

@section('page-title')
QWERTY
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="mx-auto col-xl-8 col-sm-10 ">
                <h2>{{__('All Posts')}}</h2>
            </div>
            @foreach($posts as $post)
            <div class="mx-auto col-xl-8 col-sm-10 p-3">
                <div class="border p-3 rounded shadow-sm">
                    <h3>{{$post->title}}</h3>
                    @if($post->cover != null)
                    <img src="{{asset('images/'.$post->cover)}}" class="w-100">
                    @endif
                    <div>
                        {{__('Author')}}
                        <a href="{{route('post.user',['user'=>$post->user->id])}}">
                            {{$post->user->name}}
                        </a>
                    </div>
                    <div class="mb-3">
                        {{__('Create Time')}}:{{$post->created_at}}
                    </div>
                    <div>
                        {{__('Category')}}:
                        <span class="badge bg-secondary">
                            <a href="{{route('post.category',['category'=>$post->category_id])}}" class="text-white">
                                {{$post->category->title}}
                            </a>
                        </span>
                    </div>
                    <div>
                        {{__('Tag')}}:
                        @foreach($post->tags as $tag)
                        <span class="badge bg-warning">
                            <a href="" class="text-white">
                                {{$tag->title}}
                            </a>
                        </span>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        {{Str::limit(strip_tags($post->content),100)}}
                    </div>
                    <div class="mb-3">
                        {{__('Last Update')}}:{{$post->updated_at}}
                    </div>
                    <a href="{{route('post.show',['id'=>$post->id])}}" class="btn btn-primary btn-sm">繼續閱讀</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
