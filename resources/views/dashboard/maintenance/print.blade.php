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
            <div class="row mt-2">
                <div class="col-sm">
                    <h4 class="text-uppercase text-center mb-4">Work Order</h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-sm-4">
                    <div class="card p-2">
                        <div class="row">
                            <small class="col-sm-4"> Date </small>
                            <small class="col-sm-4"> : {{ $data->tgl }} </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-4"> Unit Name </small>
                            <small class="col-sm-4">
                                : {{ $data->unit->name }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-4"> Brand/Type </small>
                            <small class="col-sm-8">
                                : {{ $data->unit->type->brand->name }}
                                {{ $data->unit->type->name }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card p-2">
                        <div class="row">
                            <small class="col-sm-4"> Group </small>
                            <small class="col-sm-4">
                                : {{ $data->unit->group->name }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-4"> Flag </small>
                            <small class="col-sm-8">
                                : {{ $data->unit->flag->name }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-4"> Brand/Type </small>
                            <small class="col-sm-8">
                                : {{ $data->unit->type->brand->name }}
                                {{ $data->unit->type->name }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
