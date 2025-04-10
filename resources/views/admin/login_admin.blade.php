<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/porto-icon.png') }}">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body class="login-body">
    <div class="login-container">
        <h2 class="login-title">Login</h2>

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login_submit') }}">
            @csrf

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required>
                @error('username')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
