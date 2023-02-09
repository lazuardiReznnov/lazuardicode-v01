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
                <div class="row d-flex">
                    <div class="col-sm-3">
                        <img
                            class="rounded-circle mx-auto d-block shadow my-3"
                            src="http://source.unsplash.com/200x200?logo"
                            alt=""
                            width="50"
                        />
                    </div>
                    <div class="col-sm-6 align-self-center">
                        <h2 class="text-center">REPAIR APPLICATION FORM</h2>
                    </div>
                    <div class="col-sm-3 align-self-center">
                        <div class="row">
                            <small class="col-sm-5"> No. SPK </small>
                            <small class="col-sm-7">
                                : {{ $data->slug }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-5"> Date </small>
                            <small class="col-sm-7">
                                :
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d F Y') }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-5"> Estimate </small>
                            <small class="col-sm-7">
                                @php $tgl = new DateTime($data->tgl); $finish =
                                new DateTime($data->finish); $diff =
                                $tgl->diff($finish); @endphp :
                                {{$diff->days}} Day
                            </small>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="row justify-content-center p-3">
                    <div class="col-sm-12">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Unit Name
                                        </small>
                                        <small class="col-sm-9">
                                            : {{ $data->unit->name }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Brand/Type
                                        </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->unit->type->brand->name }}
                                            {{ $data->unit->type->name }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3"> VIN </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->unit->vin }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Engine Number
                                        </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->unit->engine_numb}}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3"> Year </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->unit->year}}
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <small class="col-sm-3"> Owner </small>
                                        <small class="col-sm-9">
                                            : {{ $data->unit->flag->name }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3"> Group </small>
                                        <small class="col-sm-9">
                                            : {{ $data->unit->group->name }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center p-3">
                    <div class="col-sm-12">
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Repaird Request
                                        </small>
                                        <small class="col-sm-9">
                                            : {{ $data->name }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Description
                                        </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->description }}
                                        </small>
                                    </div>
                                    <div class="row">
                                        <small class="col-sm-3">
                                            Instruction Repaired
                                        </small>
                                        <small class="col-sm-9">
                                            :
                                            {{ $data->instruction }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        Tangerang,
                        {{ \Carbon\Carbon::parse($data->tgl)->format('d F Y') }}
                        <br />
                        <p class="fw-bold">PT. Name</p>
                        <br />
                        <br />
                        <br />
                        <br />
                        (----------------------------) <br />
                        <p class="ms-4">Service advisor</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
