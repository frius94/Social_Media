<nav class="navbar navbar-default">
    <a class="navbar-brand mr-5" href="/">
        <img src="" class="img-fluid" width="40" height="40" alt="TBZ-SM">
    </a>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand mr-5" href="/">
            <img src="<?= url('media/logo.png'); ?>" class="img-fluid" width="40" height="40" alt="TBZ-SM">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @if(!Auth::guest())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/{{Auth::user()->id}}">Profile</a>
                    </li>
                </ul>
                <form class="form-inline mx-md-5">
                    <input class="typeahead form-control" data-provide="typeahead" type="search" id="search"
                           placeholder="Search" aria-label="Search"
                           size="30" name="search" autocomplete="off">
                </form>
            @if(isset($response))
                <p class="mb-0 mr-auto">{{$response}}</p>
                @endif
        @endif

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname .' '.Auth::user()->lastname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
