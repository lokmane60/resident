<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>Sign In</h1>
        <form method="POST" action="{{ route('signin') }}">
            @csrf
            <input type="text" name="email_or_username" placeholder="Email or Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
        <a href="#">Forgot Username?</a>
        <a href="#">Forgot Email?</a>
        <a href="#">Forgot Password?</a>
        <a href="{{ route('signup') }}">Don't have an account? Sign Up</a>
    </div>
</body>
</html>
