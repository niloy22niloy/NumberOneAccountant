<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>
    <h1>Welcome to the Public Frontend</h1>

    @auth
        <p>Logged in as user: {{ auth()->user()->name }}</p>
        <a href="/dashboard">Go to User Dashboard</a>
    @else
        <a href="/login">Login as User</a>
        <a href="/register">Register</a>
    @endauth

    <br><a href="/admin/login">Login as Admin</a>
</body>
</html>
