<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login with Twitter</h2>
    <form method="get"  action="{{ route('twitter.connect') }}">
        @csrf <!-- CSRF protection -->
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

</body>
</html>
