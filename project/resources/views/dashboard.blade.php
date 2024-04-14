<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white align-item-center mb-3">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse border border-2" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 p-1 text-center">
                    
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  @guest
                  <li class="nav-item">|</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Đăng nhập</a>
                  </li>
                  <li class="nav-item">|</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.createUser')}}">Đăng ký</a>
                  </li>
                  @else
                  <li class="nav-item">|</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('signout')}}">Đăng xuất</a>
                  </li>
                  @endguest
                </ul>
              </div>
            </div>
          </nav>
    </header>
    @yield('content')
    <footer class="bg-footer mt-5 text-center text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    © 2024 - Bùi Anh Tú
                </div>
            </div>
        </div>
    </footer>
</body>
</html>