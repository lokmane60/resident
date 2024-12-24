<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="form-container">
        <h1>Sign Up</h1>
        <form method="POST" action="{{ route('signup') }}">
            @csrf
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="username" placeholder="Username (optional)">
            <input type="email" name="email" placeholder="Email (optional)">
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <input type="text" name="phone" placeholder="Phone (optional)">
            <button type="submit">Sign Up</button>
        </form>
        <a href="{{ route('signin') }}">Already have an account? Sign In</a>
    </div>
</body>
</html>
