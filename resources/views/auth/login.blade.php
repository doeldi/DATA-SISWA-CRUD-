<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            height: 100vh;
        }

        .login-form {
            flex: 1;
            padding: 50px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-content {
            flex: 1;
            padding: 50px;
            background-color: #007bff;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-title {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }

        .ornament {
            font-size: 72px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-form">
            <h2 class="login-title">Login</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-login">Login</button>

                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                </div>
            </form>
        </div>
        <div class="login-content">
            <h1>Welcome to Studata</h1>
            <p>Kelola data siswa secara efisien dengan Studata. Login sekarang untuk mengakses akun Anda dan
                menyederhanakan pengelolaan informasi siswa Anda.</p>
        </div>
    </div>
</body>

</html>
