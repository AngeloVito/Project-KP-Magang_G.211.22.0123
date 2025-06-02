<!DOCTYPE html>
<html>
    <head>
        <title>Login User</title>
        <link href="login.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container" style="max-width: 400px;">
            <h2>Login Karyawan</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-failed">
                    {{ session('failed') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="text-center">
                    <p>Belum punya akun?<a href="{{ route('register') }}" class="btn btn-link">Registrasi</a></p>
                </div>
            </form>
        </div>
    </body>
</html>