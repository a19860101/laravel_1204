@extends('template.master')

@section('page-title')
    QWERTY-編輯文章
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mx-auto col-xl-8 col-sm-10">
                <h2>編輯文章</h2>
                <hr>
            </div>
            <div class="mx-auto col-xl-8 col-sm-10">
                <form action="{{route('post.update',['id'=>$post->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">文章標題</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">分類</label>
                        <select name="category_id" id="" class="form-select">
                        @foreach ($categories as $category)
                            <option
                                value="{{$category->id}}"
                                {{ $category->id == $post->category_id ? 'selected':'' }}
                                >{{$category->title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">文章內文</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="儲存文章">
                    <input type="button" class="btn btn-danger" value="取消" onclick="history.back()">

                </form>
            </div>
        </div>
    </div>
@endsection
