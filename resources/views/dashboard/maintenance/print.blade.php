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
                        nomor SPK : {{ $data->slug }}
                    </div>
                </div>

                <hr />
                @php $tgl = new DateTime($data->tgl); $finish = new
                DateTime($data->finish); $diff = $tgl->diff($finish); @endphp
                <div class="row justify-content-center p-3">
                    <div class="col-sm-10">
                        Respectfully, <br />
                        Please be informed that there has been damage, <br />
                        which occurred at :

                        <div class="row mt-3">
                            <small class="col-sm-3">Date </small>
                            <small class="col-sm-9">
                                :
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d/m/Y') }}
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Group </small>
                            <small class="col-sm-9">
                                :
                                {{ $data->unit->group->name }}
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Unit </small>
                            <small class="col-sm-9">
                                :
                                {{ $data->unit->name }}
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Brand/Type </small>
                            <small class="col-sm-9">
                                :
                                {{ $data->unit->type->brand->name }}
                                {{ $data->unit->type->name }}
                                {{ $data->unit->year }}
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Repair Request </small>
                            <small class="col-sm-9">
                                :
                                {{ $data->name }}
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Estimate </small>
                            <small class="col-sm-9">
                                : {{ $diff->days }} Day
                            </small>
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Description </small>
                            <small class="col-sm-9">
                                : {{ $data->description }}</small
                            >
                        </div>

                        <div class="row">
                            <small class="col-sm-3">Damage</small>
                            <small class="col-sm-9"> : {{ $data->name }}</small>
                        </div>
                        <div class="row mb-3">
                            <small class="col-sm-3">Repair Instructions</small>
                            <small class="col-sm-9">
                                : {{ $data->instruction }}</small
                            >
                        </div>

                        Thus, we convey this official report truthfully
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
                        Team Leader
                    </div>
                </div>
            </div>

            <div class="card p-3">
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
                        <h2 class="text-center">Work Order</h2>
                    </div>
                    <div class="col-sm-3">nomor SPK : {{ $data->slug }}</div>
                </div>
                <hr />

                <div class="row justify-content-between p-3 ms-5">
                    <div class="col-sm-4">
                        <div class="row mt-3">
                            <small class="col-sm-3">Date </small>
                            <small class="col-sm-9">
                                :
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d/m/Y') }}
                            </small>
                        </div>
                        <div class="row">
                            <small class="col-sm-3">Unit </small>
                            <small class="col-sm-9">
                                :
                                {{ $data->unit->name }}
                            </small>
                        </div>
                    </div>

                    <div class="col-sm-4 ms-auto">
                        <div class="row mt-3">
                            <small class="col-sm-4">Estimate </small>

                            <small class="col-sm-7">
                                : {{ $diff->days }} Day</small
                            >
                        </div>
                        <div class="row">
                            <small class="col-sm-4">Mechanic </small>
                            <small class="col-sm-7"> : </small>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="row">
                            <small class="col-sm-5 fw-bold">Damage</small>
                            <small class="col-sm-7"> : {{ $data->name }}</small>
                        </div>

                        <div class="row">
                            <small class="col-sm-5 fw-bold"
                                >Repair Instruction</small
                            >
                            <small class="col-sm-7">
                                : {{ $data->instruction }}</small
                            >
                        </div>
                    </div>
                </div>

                <hr />

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
                        Team Leader
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
