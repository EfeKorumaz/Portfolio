<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v6.1.2/css/pro.min.css">
    <style>
        .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }

        .dropdown {
        position: relative;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .dropdown-content a:hover {
        background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
        display: block;
        }

        .dropdown:hover .dropbtn {
        background-color: #3e8e41;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Laravel lessenserie</title>

</head>
<body>

<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative border-t border-b border-gray-300">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div class="w-full md:w-3/4 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            
            <a href="/" class="dropbtn">Home</a>

            <div class="dropdown">
            <button class="dropbtn">Overview</button>
                <div class="dropdown-content">
                    <a href="/courses">Courses</a>
                    @guest
                    @else
                    <a href="/enrollments">Enrollments</a>
                    <a href="/modules">Modules</a>
                    <a href="/lessons">Lessons</a>
                    @endguest
                </div>
            </div>

            @guest
            @else
            <div class="dropdown">
            <button class="dropbtn">Enrollments</button>
                <div class="dropdown-content">
                    <a href="/open/enrollments/create">Enroll In</a>
                </div>
            </div>
            @endguest
            <div class="dropdown">
            <button class="dropbtn">User</button>
                <div class="dropdown-content">
                    @guest
                        @if(Route::has('register'))
                        <a href="{{ route('register') }}">Sign Up</a>
                    @endif
                        <a href="{{ route('login') }}">Login</a>
                    @else
                        <img src="{{ asset('img/user.svg') }}">
                        <p href="">{{ Auth::user()->name }}</p>
                        @hasrole('admin')
                            <a href="/admin">To Admin</a>
                        @endhasrole
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- /nav -->

@yield('content')

<!-- footer -->
<footer class="w-full bg-white px-6 border-t">
    <div class="container mx-auto max-w-4xl py-6 flex flex-wrap md:flex-no-wrap justify-between items-center text-sm">
        &copy;2019 Your Company. All rights reserved.
        <div class="pt-4 md:p-0 text-center md:text-right text-xs">
            <a href="#" class="text-black no-underline hover:underline">Privacy Policy</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Terms &amp; Conditions</a>
            <a href="#" class="text-black no-underline hover:underline ml-4">Contact Us</a>
        </div>
    </div>
</footer>
<!-- /footer -->


</body>
</html>
