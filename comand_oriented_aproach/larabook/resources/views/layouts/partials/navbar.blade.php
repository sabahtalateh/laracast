<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Larabook</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
                <li><a href="{{ route('users_path') }}">Browse users</a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                @if ($currentUser)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}"
                                 alt="{{ $currentUser->username }}"/>
                            {{ $currentUser->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile_path', $currentUser->username) }}">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout_path') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('register_path') }}">Register</a></li>
                    <li><a href="{{ route('login_path') }}">Login</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>