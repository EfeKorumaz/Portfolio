<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Platform</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/course-platform.css') }}">
    <!-- If asset() doesn't work, use: <link rel="stylesheet" href="/css/course-platform.css"> -->
</head>

<body>

<div class="layout">
    @include('layouts.navigation')


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            @if(session('status') == 'profile-updated')
             successfully.
            @elseif(session('status') == 'password-updated')
             successfully.
            @endif
        </div>
        @endif

        <main class="content">
            <p>Welcome</p>
            <p>To the Course Platform Website</p>
        </main>

        <footer class="footer">
            <p>Footer™</p>
        </footer>
    </div>
    </div>
</body>

</html>