<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance">
            maintenance Management
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="btn-group mb-4">
        <a
            href="/dashboard/maintenance/part/{{ $data->slug }}"
            class="btn btn-primary"
            aria-current="page"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Add Sparepart"
            ><i class="bi bi-file-earmark-plus"></i
        ></a>
        <a
            href="/dashboard/maintenance/print-spk/{{ $data->slug }}"
            class="btn btn-primary"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Print SPK"
            ><i class="bi bi-printer"></i
        ></a>
        <a
            href="/dashboard/maintenance/state/{{ $data->slug }}"
            class="btn btn-primary"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Update progress"
            ><i class="bi bi-pencil-square"></i
        ></a>
        <a
            href="/dashboard/maintenance/image/{{ $data->slug }}"
            class="btn btn-primary"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Upload Image"
            ><i class="bi bi-upload"></i
        ></a>
    </div>
    <!-- Pesan -->
    <div class="row">
        <div class="col-md-10">
            @if(session()->has('success'))
            <x-card>
                <!-- pesan -->

                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    {{ session("success") }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="close"
                    ></button>
                </div>

                <!-- endpesan -->
            </x-card>
            @endif
        </div>
    </div>
    <!-- endPesan -->
    <x-card>
        <h4>Unit Detail</h4>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <small class="col-md-5">Brand/Type Unit</small>
                    <small class="col-md-7">
                        : {{ $data->unit->type->brand->name }}
                        {{ $data->unit->type->name }}
                    </small>
                </div>
                <div class="row mb">
                    <small class="col-md-5">Category</small>
                    <small class="col-md-7"
                        >: {{ $data->unit->type->category->name }}</small
                    >
                </div>
                <div class="row mb-2">
                    <small class="col-md-5">Unit Name</small>
                    <small class="col-md-7">: {{ $data->unit->name }}</small>
                </div>
                <div class="row">
                    <small class="col-sm-5"> VIN </small>
                    <small class="col-sm-7">
                        :
                        {{ $data->unit->vin }}
                    </small>
                </div>
                <div class="row">
                    <small class="col-sm-5"> Engine Number </small>
                    <small class="col-sm-7">
                        :
                        {{ $data->unit->engine_numb}}
                    </small>
                </div>
                <div class="row">
                    <small class="col-sm-5"> Year </small>
                    <small class="col-sm-7">
                        :
                        {{ $data->unit->year}}
                    </small>
                </div>
            </div>
        </div>
    </x-card>

    <x-card>
        <h4>Repaired Detail</h4>
        <hr />
        <div class="row">
            <div class="col-md-8">
                <div class="row mb">
                    <small class="col-md-4">Date</small>
                    <small class="col-md-8"
                        >:
                        {{ \Carbon\Carbon::parse($data->tgl)->format('d F Y') }}</small
                    >
                </div>
                <div class="row mb">
                    <small class="col-md-4">Request Repaired</small>
                    <small class="col-md-8">: {{ $data->name }}</small>
                </div>
                <div class="row mb">
                    <small class="col-md-4">Description</small>
                    <small class="col-md-8">: {{ $data->description }}</small>
                </div>
                <div class="row mb">
                    <small class="col-md-4">Repair Instructions</small>
                    <small class="col-md-8">: {{ $data->instruction}}</small>
                </div>
                <div class="row">
                    <small class="col-sm-4"> Estimate </small>
                    <small class="col-sm-8">
                        :
                        {{ \Lazuardicode::estimate($data->tgl, $data->finish) }}
                        Days
                    </small>
                </div>
                <div class="row mb">
                    <small class="col-md-4">Repair State</small>
                    <small class="col-md-8"
                        >: {{ $data->status }} <br />

                        @php if($data->status == 'start'){ $prog = 0; }elseif(
                        $data->status =='checking' ){ $prog = 25;
                        }elseif($data->status == 'processing'){ $prog = 50;
                        }elseif($data->status == 'finishing'){ $prog = 75;
                        }elseif($data->status == 'complated'){ $prog = 100; }
                        @endphp

                        <div class="progress">
                            <div
                                class="progress-bar"
                                role="progressbar"
                                aria-label="Example with label"
                                style="width: {{ $prog }}%"
                                aria-valuenow="{{ $prog }}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                            >
                                {{ $prog }}%
                                <br />
                            </div>
                        </div>
                        <p>
                            Update at : {{ $data->updated_at->diffForHumans() }}
                        </p>
                    </small>
                </div>
            </div>
        </div>
    </x-card>

    <x-card>
        <h4>Sparepart Data</h4>
        <hr />

        <table id="table" class="table table-responsive mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sparepart</th>
                    <th>Qty</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @if($mparts->count()) @foreach($mparts as $mpart)

                <tr>
                    <th scope="row">
                        {{ ($mparts->currentpage()-1) * $mparts->perpage() + $loop->index + 1 }}
                    </th>

                    <td>
                        {{ $mpart->sparepart->name }}
                    </td>
                    <td>{{ $mpart->qty }}</td>

                    <td>
                        <a
                            href="/dashboard/maintenance/part/{{ $data->slug }}/{{ $mpart->slug }}/edit"
                            class="badge bg-warning"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit maintenance"
                            ><i class="bi bi-pencil-square"></i
                        ></a>

                        <form
                            action="/dashboard/maintenance/part/{{ $data->slug }}/{{ $mpart->slug }}"
                            method="post"
                            class="d-inline"
                        >
                            @method('delete') @csrf
                            <button
                                class="badge bg-danger"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Delete maintenance"
                                onclick="return confirm('are You sure ??')"
                            >
                                <i class="bi bi-file-x-fill"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        Update At : {{ $mpart->updated_at->diffForHumans() }}
                    </td>
                </tr>

                @endforeach @else
                <tr>
                    <td colspan="6" class="text-center">Data Not Found</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-8">
                {{ $mparts->onEachside(2)->links() }}
            </div>
        </div>
    </x-card>
</x-admin-layout>
