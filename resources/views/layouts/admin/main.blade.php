<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title ?? config("app.name") }}</title>
        <link href="/asset/css/styles.css" rel="stylesheet" />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"
        ></script>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-navbar> </x-navbar>

        <div id="layoutSidenav">
            @auth
            <div id="layoutSidenav_nav">@include('layouts.admin.sidebar')</div>
            @endauth
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">{{ $slot }}</div>
                </main>
                @include('layouts.admin.footer')
            </div>
        </div>

        <script src="/asset/js/scripts.js"></script>
    </body>
</html>
