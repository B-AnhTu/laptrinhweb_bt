@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Hinh anh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><img class="img-list" src="{{ asset('images/' . $user->image) }}" alt="User Image"></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Danh sách bài viết đã viết</h4>
                <a href="{{route('post.createPost')}}"><button class="btn-add">Thêm bài viết</button></a>
            </div>
            
    <table>
        <thead>
            <th>ID</th>
            <th>Post name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($user->posts as $post)
            <tr>
                <td>{{ $post->post_id }}</td>
                <td>{{ $post->post_name }}</td>
                <td>
                    <a href="{{ route('post.readPost', ['id' => $post->post_id])}}"><i class="fa-solid fa-eye"></i></a> |
                    <a href="{{ route('post.updatePost', ['id' => $post->post_id]) }}"><i class="fa-solid fa-pen"></i></a> |
                    <a href="{{ route('post.deletePost', ['id' => $post->post_id]) }}"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    <h4>Danh sách sở thích (N-N)</h4>
    <table>
        <thead>
        <th>ID</th>
        <th>Favorite</th>
        </thead>
        <tbody>
        @foreach($user->favorities as $favorite)
            <tr>
                <td>{{ $favorite->favorite_id }}</td>
                <td>{{ $favorite->favorite_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection