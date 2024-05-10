@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Hiển thị thông báo thành công -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Hiển thị thông báo lỗi -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Hinh anh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->phone }}</th>
                                <th><img class="img-list" src="{{ asset('images/' . $user->image) }}" alt="User Image"></th>
                                <th>
                                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a> |
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}"><i class="fa-solid fa-pen"></i></a> |
                                    <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col mt-3">
                    <!-- Hiển thị thanh phân trang -->
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </main>
@endsection