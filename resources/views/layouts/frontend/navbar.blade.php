<nav
    class="navbar navbar-expand-lg navbar-dark bg-blue-900 shadow-sm gradient border-bottom border-light"
>
    <div class="container">
        <a class="navbar-brand" href="#">
            LAZUARDI <i class="bi bi-activity"></i> CODE</a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{
                        __("LOGIN")
                    }}</a>
                </li>
                @endif @else
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdown"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        ><i class="fas fa-user fa-fw"></i>
                        {{ Auth::user()->name }}</a
                    >
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdown"
                    >
                        <li>
                            <a
                                class="dropdown-item"
                                href="/dashboard/user/profil"
                                >Profil</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#!">Activity Log</a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"
                            >
                                {{ __("Logout") }}
                            </a>

                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                class="d-none"
                            >
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
