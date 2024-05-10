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
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$favorite->favorite_id}}</td>
                            <td>{{$favorite->favorite_name}}</td>
                            <td>{{$favorite->favorite_description}}</td>
                            

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</div>
@endsection