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
            <h1>Course List</h1>
            <p class="user-count">Courses: {{ $courses->count() }}</p>

            <div class="users-grid">
                @forelse($courses as $course)
                    <div class="user-card">

                        <div class="user-info">
                            <h3 class="user-name">{{ $course->title }}</h3>
                            <p class="user-email">{{ $course->description }}</p>
                            <p class="user-date">Joined: {{ $course->created_at->format('M, d, Y') }}</p>
                        </div>
                    </div>
                @empty
                    <p>No courses found.</p>
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
