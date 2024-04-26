@extends('dashboard')

@section('content')
<div class="container mt-5">
    <a href="{{route('post.createPost')}}"><button class="btn-Add">Thêm bài viết</button></a>
        <div class="row justify-content-center">
            <div class="col">
                <div class="post p-3">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->post_id }}</td>
                            <td>{{ $post->post_name }}</td>
                            <td>{{ $post->post_description }}</td>
                            <td>
                                <a href="{{route('post.readPost', ['id' => $post->id])}}"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('post.updatePost', ['id' => $post->id])}}"><i class="fa-solid fa-pen"></i></a>
                                <a href="{{route('post.deletePost', ['id' => $post->id])}}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection