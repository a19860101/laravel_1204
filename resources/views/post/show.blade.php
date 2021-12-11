<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @foreach($posts as $post) --}}
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->content}}
    </div>
    <a href="/post">文章列表</a>
    <a href="/post/{{$post->id}}/edit">編輯文章</a>
    {{-- @endforeach --}}
</body>
</html>
