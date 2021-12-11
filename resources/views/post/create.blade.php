@extends('template.master')

@section('page-title')
    QWERTY-新增文章
@endsection

@section('main')
<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col-xl-8 col-sm-10">
        @if($errors -> any())
            @foreach ($errors->all() as $e)
            <div class="alert alert-danger" role="alert">
                {{$e}}
            </div>
            @endforeach
        @endif
        </div>
        <div class="mx-auto col-xl-8 col-sm-10">
            <h2>新增文章</h2>
            <hr>
        </div>
        <div class="mx-auto col-xl-8 col-sm-10 p-3">
            <form action="{{route('post.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">文章標題</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">文章內文</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="新增文章">
                <input type="button" class="btn btn-danger" value="取消" onclick="location.href='{{route('post.index')}}'">
            </form>
        </div>
    </div>
</div>

@endsection
