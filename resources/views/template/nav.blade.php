<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('post.index')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="{{route('post.index')}}">文章列表</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li><a href="{{route('post.category',['category'=>$category->id])}}" class="dropdown-item">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('post.create')}}">新增文章</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('category.index')}}">分類管理</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
