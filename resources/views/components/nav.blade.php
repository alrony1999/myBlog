<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">MYBLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto mr-5 pr-3">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{strtoupper(auth()->user()->name)}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @author
                    <a class="dropdown-item" href="{{route('author.dashboard')}}">DashBoard</a>
                    <a class="dropdown-item" href="{{route('author.postList')}}">My All Post</a>
                    @endauthor
                    @admin
                    <a class="dropdown-item" href="{{route('admin.dashboard')}}">DashBoard</a>
                    <a class="dropdown-item" href="{{route('admin.authorList')}}">All Author</a>
                    @endadmin
                    <a class="dropdown-item" href="" id="logout">Logout</a>
                </div>
            </li>
            @else
            <li class="nav-item ">
                <a class="nav-link" href="/login">Login </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/register">Register</a>
            </li>
            @endauth
        </ul>
        <form id="logoutform" action="/logout" method="POST">
            @csrf
        </form>
    </div>
</nav>