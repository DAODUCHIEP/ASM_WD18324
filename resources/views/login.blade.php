<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>

    <div class="container mt-5">
        <h4>Đăn Nhập</h4>
        @if (session('message'))
            <p class="text-danger">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postLogin') }}" method="post">
            @csrf

            <div class="mb-3">
                Email:
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                Password:
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-success">Đăn Nhập</button>

            <a class="btn btn-success" href="{{ route('register') }}">Đăng Ký</a>
        </form>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
