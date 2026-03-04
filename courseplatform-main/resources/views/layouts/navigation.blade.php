<nav class="navbar-custom">
    <a href="{{ route('home') }}" class="nav-link">Home</a>

    <div class="dropdown">
        <button class="nav-link dropdown-toggle">Overview</button>
        <div class="dropdown-menu">
            <a href="{{ route('course') }}" class="dropdown-item">Course</a>
            <a href="{{ route('signedin') }}" class="dropdown-item">Signed In</a>
            <a href="{{ route('module') }}" class="dropdown-item">Module</a>
            <a href="{{ route('lesson') }}" class="dropdown-item">Lesson</a>
            <a href="{{ route('courselist') }}" class="dropdown-item">Courselist</a>
            <a href="{{ route('modulelist') }}" class="dropdown-item">Modules</a>

        </div>
    </div>

    <div class="dropdown">
        <button class="nav-link dropdown-toggle">Signing</button>
        <div class="dropdown-menu">
            @guest
                <a href="{{ route('signedin') }}" class="dropdown-item">Sign Up</a>
                <a href="{{ route('signedout') }}" class="dropdown-item">Sign Out</a>
            @endguest
            @auth
            <a href="{{ route('signedin') }}" class="dropdown-item">Sign Up</a>
                <a href="{{ route('signedout') }}" class="dropdown-item">Sign Out</a>
            @endauth
        </div>
    </div>

    <div class="dropdown">
        <button class="nav-link dropdown-toggle">User</button>
        <div class="dropdown-menu">
            @guest
                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
            @endguest
            @auth
                <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <a href="#" class="dropdown-item"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
                <a href="{{ route('userlist') }}" class="dropdown-item">Userlist</a>
            @endauth
        </div>
    </div>

    <div class="profile-circle">
        @auth
            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
        @else
            pfp
        @endauth
    </div>
</nav>
