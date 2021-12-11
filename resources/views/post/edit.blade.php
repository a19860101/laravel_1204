@extends('template.master')

@section('page-title')
    QWERTY-編輯文章
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <h2>編輯文章</h2>
                <hr>
            </div>
            <div class="col-7">
                <form action="{{route('post.update',['id'=>$post->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">文章標題</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">文章內文</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="儲存文章">
                </form>
            </div>
        </div>
    </div>
@endsection
