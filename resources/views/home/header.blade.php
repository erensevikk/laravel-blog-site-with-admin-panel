<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="index.html"><img src="{{asset('images/logo.png')}}"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href={{route('home')}}>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{route('home')}}>Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href={{route('home')}}>Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('home')}}">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="logo"><a href="{{route('home')}}"><img src="images/logo.png"></a></div>
        <div class="menu_main">
            <ul>
                @if (Route::has('login'))
                    @auth
                        @if(Auth()->user()->usertype=='admin')
                            <li><a href="{{url('/admin')}}">Admin Panel</a></li>
                        @endif
                    @endauth
                @endif
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('home')}}#about">About</a></li>
                <li><a href="{{route('home')}}#blog">Blog</a></li>
                @if (Route::has('login'))
                    @auth
                        <li><x-app-layout></x-app-layout></li>
                        <li><a href={{route('my-posts.index')}}>My Blog</a></li>
                        <li><a href="{{route('my-posts.create')}}">Create Blog</a></li>

                    @else
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</div>
