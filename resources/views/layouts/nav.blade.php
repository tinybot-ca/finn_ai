<header>
    <nav class="navbar bg-dark navbar-dark navbar-expand-sm">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-medkit"></i> BFN100</a>
            <button class="navbar-toggler" type="button"
                data-toggle="collapse"
                data-target="#myTogglerNav"
                aria-controls="myTogglerNav"
                aria-expanded="false"
                aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myTogglerNav">
                <div class="navbar-nav ml-auto">
                    @if (! Auth::check())

                        <a class="nav-item nav-link" href="/login">Login</a>

                        <a class="nav-item nav-link" href="/register">Register</a>

                    @else

                        <a class="nav-item nav-link" href="/pushups/create">Submit</a>

                        <a class="nav-item nav-link" href="/tutorial">Tutorial</a>

                        <a class="nav-item nav-link" href="/users">Users</a>

                        <a class="nav-item nav-link" href="/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>