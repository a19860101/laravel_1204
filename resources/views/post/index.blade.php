<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>文章列表</h1>
    {{-- <a href="/post/create">新增文章</a> --}}
    <a href="{{route('post.create')}}">新增文章</a>
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
</body>
</html>
