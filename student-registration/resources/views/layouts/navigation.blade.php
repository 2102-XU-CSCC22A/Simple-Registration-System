<nav class="main-header navbar navbar-expand navbar-white navbar-light layout-navbar-fixed">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" data-enable-remember="true" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link"></a>
        </li>     
    </ul>

    <ul class="navbar-nav ml-auto">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} 
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-white elevation-4">
    <a href=" {{ route('home') }} " class="brand-link">
        <img src=" {{ asset('images/xu_seal_logo.png') }} " alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
        XU Student Registration
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::user())
                <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" id="home-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Home</p>
                </a>
                </li>

                <li class="nav-item">
                <a href="{{ route('students') }}" class="nav-link" id="students-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>Students</p>
                </a>
                </li>
                @endif 
            </ul>
        </nav>
    </div>
</aside>

<aside class="control-sidebar control-sidebar-dark"></aside>

