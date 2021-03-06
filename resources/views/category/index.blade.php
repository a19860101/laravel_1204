@extends('template.master')

@section('page-title')
    QWERTY-分類管理
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($errors -> any())
                    @foreach ($errors->all() as $e)
                    <div class="alert alert-danger" role="alert">
                        {{$e}}
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="col-12">
                <h2>分類管理</h2>
            </div>
            <div class="col-8">
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">分類標題</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">分類英文標題</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <input type="submit" class="btn btn-primary" value="新增分類">
                </form>
            </div>
            <div class="col-4">
                <ul class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        {{$category->title}}
                        <form action="{{route('category.destroy',['category' => $category->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger btn-sm" value="刪除" onclick="return confirm('確認刪除？')">
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
