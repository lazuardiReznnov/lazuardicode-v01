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
            href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;4 mb-200;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,700;1,600&family=Roboto:wght@300;400;700&display=swap"
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
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h2 class="text-light text-shadow-lg">
                            Lazuardi <i class="bi bi-activity"></i> Code
                        </h2>
                        <p class="text-blue-100">Web Design | Program</p>
                        <p class="text-blue-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Doloribus dolorum ipsum mollitia earum magni
                            minus quidem. Voluptatum in blanditiis odio.
                        </p>
                        <button class="btn btn-primary">Enter</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Endjumbotron -->

        <!-- Content -->
        <main>
            <div class="container">
                <div class="mb-5">
                    <h1 class="text-center mb-3 text-blue-800 text-shadow">
                        About
                    </h1>
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Eius maxime recusandae vel
                                quas commodi illo porro perferendis expedita
                                ratione suscipit.
                            </p>
                        </div>
                        <div class="col-md-5">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Eius maxime recusandae vel
                                quas commodi illo porro perferendis expedita
                                ratione suscipit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-900 rounded p-3">
                    <h1 class="text-blue-100 text-shadow text-center mb-4">
                        Portofolio
                    </h1>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?truck"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?car"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?cartoon"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?transformer"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?ford"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <img
                                    src="http://source.unsplash.com/200x200?truck"
                                    alt=""
                                />
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the
                                        card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="#" class="btn btn-primary"
                                        >Go somewhere</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 mb-3">
                    <h1 class="text-center">Contac Us</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Form Contac</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlInput1"
                                            class="form-label"
                                            >Email address</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="exampleFormControlInput1"
                                            placeholder="name@example.com"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Example textarea</label
                                        >
                                        <textarea
                                            class="form-control"
                                            id="exampleFormControlTextarea1"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End Content -->

        <!-- Footer -->
        <footer
            class="d-flex items-content-center justify-content-center bg-blue-900 p-5 text-white f-poppins"
        >
            <div>
                Copy &copy; Right 2022, Lazuardi
                <i class="bi bi-activity"></i> Code
            </div>
        </footer>
        <!-- EndFooter -->
    </body>
</html>
