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
                    <div class="col-sm-6 align-self-center text-center">
                        <h1 class="text-primary">
                            {{ $data->owner }}
                        </h1>
                        <small>{{ $data->owner_add }}</small>
                    </div>
                </div>

                <hr />
                <h3 class="text-center mb-3">SURAT KUASA</h3>

                <div class="row justify-content-center p-3">
                    <div class="col-sm-8">
                        <p>Yang bertanda tangan dibawah ini :</p>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row ms-2">
                                    <small class="col-sm-3"> Nama </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> Alamat </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> KTP </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                            </div>
                        </div>

                        <p class="mt-2">Dengan ini memberi kuasa kepada :</p>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row ms-2">
                                    <small class="col-sm-3"> Nama </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> Alamat </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> KTP </small>
                                    <small class="col-sm-9"> : </small>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">
                            Untuk Mengurus STNK Kendaraan dengan perincian Sbb :
                        </p>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row ms-2">
                                    <small class="col-sm-3"> Merk/Type </small>
                                    <small class="col-sm-9">
                                        : {{ $data->unit->type->brand->name }}
                                        {{ $data->unit->type->name }}</small
                                    >
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> No. Polisi </small>
                                    <small class="col-sm-9">
                                        : {{ $data->unit->name }}</small
                                    >
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> No. Rangka </small>
                                    <small class="col-sm-9">
                                        : {{ $data->unit->vin }}
                                    </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3"> No. Mesin </small>
                                    <small class="col-sm-9">
                                        : {{ $data->unit->engine_numb }}
                                    </small>
                                </div>
                                <div class="row ms-2">
                                    <small class="col-sm-3">Tahun </small>
                                    <small class="col-sm-9">
                                        : {{ $data->unit->year }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <p class="mt-2">
                            Demikian Surat Kuasa ini dibuat, Semoga bisa
                            dipergunakan sebagaimana Mestinya
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center p-3">
                    <div class="col-md-12 ms-5">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                Tangerang,
                                {{ \Carbon\Carbon::parse($data->tgl)->format('d F Y') }}
                                <br />
                                <p class="fw-bold">Pemberi Kuasa</p>
                                <br />
                                <br />
                                <br />
                                <br />
                                (----------------------------) <br />
                                <p class="ms-4"></p>
                            </div>
                            <div class="col-md-6 text-center">
                                <br />
                                <p class="fw-bold">Penerima Kuasa</p>
                                <br />
                                <br />
                                <br />
                                <br />
                                (----------------------------) <br />
                                <p class="ms-6"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
