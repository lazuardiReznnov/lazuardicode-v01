<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link
            rel="stylesheet"
            href="/asset/css/bootstrap-print.css"
            media="print"
        />
    </head>
    <body>
        <div class="container">
            <div class="card p-2 mt-3">
                <h2 class="text-center">Work Order</h2>
                <hr />
                <div class="row justify-content-centers p-3">
                    <div class="col-sm-8">
                        <div class="row">
                            <small class="col-sm-3">Date</small>
                            <small class="col-sm-6">: {{ $data->tgl }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
