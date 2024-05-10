@extends('dashboard')

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="post p-3">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        <tr>
                            <td>{{ $post->post_id }}</td>
                            <td>{{ $post->post_name }}</td>
                            <td>{{ $post->post_description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection