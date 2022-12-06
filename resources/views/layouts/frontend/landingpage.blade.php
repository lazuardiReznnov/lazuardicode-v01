<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}| {{ config("app.name") }}</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue-700">
            <div class="container">
                <a class="navbar-brand" href="#">
                    LAZUARDI <i class="fas fa-wave-square"></i> CODE</a
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
                                    <a class="dropdown-item" href="#!"
                                        >Activity Log</a
                                    >
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
        <!-- endnavbar -->

        <!-- jumbotron -->
        <div class="p-5 mb-4 rounded-bottom bg-blue-100 text-center">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-5 d-flex align-items-center">
                        <h1 class="display-5 fw-bold">
                            LAZUARDI <i class="fas fa-wave-square"></i> CODE
                        </h1>
                    </div>
                    <div class="col-md-5">
                        <p class="fs-4">
                            Using a series of utilities, you can create this
                            jumbotron, just like the one in previous versions of
                            Bootstrap. Check out the examples below for how you
                            can remix and restyle it to your liking.
                        </p>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg" type="button">
                    Example button
                </button>
            </div>
        </div>

        <!-- Endjumbotron -->
    </body>
</html>
