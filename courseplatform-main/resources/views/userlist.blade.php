<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Platform - signedout</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/course-platform.css') }}">
</head>

<body>
    <div class="layout">
    @include('layouts.navigation')
    
    <main class="content-userlist">
        <div class="userlist-container">
            <h1>User List</h1>
            <p class="user-count">Total Users: {{ $users->count() }}</p>

            <div class="users-grid">
                @forelse($users as $user)
                <div class="user-card">
                    <div class="user-avatar">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <div class="user-info">
                        <h3 class="user-name">{{ $user->name }}</h3>
                        <p class="user-email">{{ $user->email }}</p>
                        <p class="user-date">Joined: {{ $user->created_at->format('M, d, Y') }}</p>
                    </div>
                </div>
                @empty
                <p>No users found.</p>
                @endforelse
            </div>
        </div>

    </main>

        <footer class="footer">
            <p>Footer™</p>
        </footer>
    </div>
</body>

</html>