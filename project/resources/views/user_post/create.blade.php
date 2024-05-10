@extends('dashboard');

@section('content')
    <main class="post-form">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-container align-item-center">
                        <p class="title">Tạo bài viết</p>
                        <form class="form" action="{{ route('post.postUserPost') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <label for="text">Tên bài viết</label><br>
                                <input type="text" placeholder="Nhập tên bài viết" id="post_name" class="form-control" name="post_name" required
                                        autofocus>
                            </div>
                            <div class="input-group">
                                <label for="text">Nội dung</label><br>
                                <input type="text" placeholder="Nhập nội dung" id="post_description" class="form-control" name="post_description">
                            </div>
                            <input type="submit" value="Tạo" class="btn btn-primary p-2 text-white">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection