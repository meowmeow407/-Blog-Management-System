<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Chronicle - Modern Blog Platform')</title>
    <meta name="description" content="A modern, high-performance responsive blogging platform with real-time AJAX filtering and robust administration dashboard.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @if(file_exists(public_path('css/style.css')))
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    @else
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @endif
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="app-header">
        <div class="header-container">
            <a href="{{ route('blogs.index') }}" class="logo-wrapper">
                <span class="logo-icon"><i class="fa-solid fa-feather-pointed"></i></span>
                <span class="logo-text">Chronicle</span>
            </a>

            <div class="header-search-wrapper">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" id="global-search-input" placeholder="Search for topics, notifications & sources..." value="{{ request('search') }}" autocomplete="off">
                <span class="search-spinner" id="global-search-loading" style="display: none;"><i class="fa-solid fa-spinner fa-spin"></i></span>
            </div>
            
            <nav class="nav-menu">
                <button id="theme-toggle" class="nav-link theme-toggle-btn" title="Toggle Light/Dark Theme" style="cursor: pointer;">
                    <i class="fa-solid fa-moon theme-toggle-icon"></i>
                </button>
                <a href="{{ route('blogs.index') }}" class="nav-link {{ request()->routeIs('blogs.index') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link nav-btn-logout">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link nav-btn-login {{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-shield"></i> Admin Portal
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="app-footer">
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} Chronicle Blog Platform. Created with Laravel, MySQL, and jQuery/AJAX.</p>
            <div class="footer-links">
                <a href="{{ route('blogs.index') }}">Home</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Admin Login</a>
                @endauth
            </div>
        </div>
    </footer>
    
    <script>
    $(document).ready(function() {
        // Theme Toggle Logic
        const savedTheme = localStorage.getItem('theme') || 'dark';
        if (savedTheme === 'light') {
            $('body').addClass('light-theme');
            $('.theme-toggle-icon').removeClass('fa-moon').addClass('fa-sun');
        } else {
            $('body').removeClass('light-theme');
            $('.theme-toggle-icon').removeClass('fa-sun').addClass('fa-moon');
        }

        $('#theme-toggle').on('click', function() {
            $('body').toggleClass('light-theme');
            
            let theme = 'dark';
            if ($('body').hasClass('light-theme')) {
                theme = 'light';
                $('.theme-toggle-icon').removeClass('fa-moon').addClass('fa-sun');
            } else {
                $('.theme-toggle-icon').removeClass('fa-sun').addClass('fa-moon');
            }
            localStorage.setItem('theme', theme);
        });

        // Global Search Redirect Logic
        $('#global-search-input').on('keypress', function(e) {
            if (e.which === 13) { // Enter key
                const val = $(this).val();
                if (window.location.pathname !== '/' && window.location.pathname !== '/index.php') {
                    window.location.href = "{{ route('blogs.index') }}?search=" + encodeURIComponent(val);
                }
            }
        });
    });
    </script>
    
    @yield('scripts')
</body>
</html>