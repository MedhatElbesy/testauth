<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}</p>
    <img src="{{ Auth::user()->avatar }}" alt="User Avatar" class="rounded-circle" width="100" height="100">
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-secondary mt-3">Logout</button>
</div>
</body>
</html>
