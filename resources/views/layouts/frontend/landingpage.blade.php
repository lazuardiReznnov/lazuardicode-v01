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
        @include('layouts/frontend/navbar')

        <!-- endnavbar -->

        <!-- jumbotron -->

        <!-- Endjumbotron -->

        <!-- Content -->
        <main>
            <div class="container">
                {{ $slot }}
            </div>
        </main>
        <!-- End Content -->

        <!-- Footer -->
        @include('layouts/frontend/footer')

        <!-- EndFooter -->
    </body>
</html>
