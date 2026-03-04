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
            <h1>Module List</h1>
            <p class="user-count">modules: {{ $modules->count() }}</p>

            <div class="users-grid">
                @forelse($modules as $module)
                    <div class="user-card">
                        <div class="user-info">
                            <h3 class="user-name">{{ $module->title }}</h3>
                            <p class="user-email">{{ $module->description }}</p>
                        </div>
                    </div>
                @empty
                    <p>No modules found.</p>
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
