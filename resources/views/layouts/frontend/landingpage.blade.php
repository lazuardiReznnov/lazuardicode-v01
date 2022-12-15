<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}| {{ config("app.name") }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,700;1,600&family=Roboto:wght@300;400;700&display=swap"
            rel="stylesheet"
        />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <!-- navbar -->
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-blue-900 shadow-sm gradient border-bottom border-light"
        >
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
        <div
            class="hero mb-4 rounded-bottom bg-primary.bg-gradient shadow-sm f-poppins d-flex align-items-center p-5 cover"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md text-center">
                        <h2 class="text-light">Lazuardi Code</h2>
                        <p class="text-muted">Web Design | Program</p>
                        <p class="text-blue-700">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Doloribus dolorum ipsum mollitia earum magni
                            minus quidem. Voluptatum in blanditiis odio.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Endjumbotron -->
    </body>
</html>
