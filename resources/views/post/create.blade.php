@extends('template.master')

@section('page-title')
    QWERTY-新增文章
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            <h2>新增文章</h2>
            <hr>
        </div>
        <div class="col-7">
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
            </form>
        </div>
    </div>
</div>
@endsection
