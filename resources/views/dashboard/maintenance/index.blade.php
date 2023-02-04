<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

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

    <!-- Tombol -->
    <div class="row">
        <div class="col-md-6 my-3">
            <a
                href="/dashboard/maintenance/create"
                class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-plus"></i
            ></a>
        </div>
    </div>
    <!-- EndTombol -->

    <div class="row">
        <div class="col-md-10">
            <x-card header="List Unit">
                <p>Bulan - {{ date("F") }}</p>
                <table id="table" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Unit</th>
                            <th>Repaired Request</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($datas->count()) @foreach($datas as $data)

                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>

                            <td>{{ $data->tgl }}</td>
                            <td>
                                {{ $data->unit->name }}
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>
                                {{ $data->status }} <br />

                                @php if($data->status == 'start'){ $prog = 0;
                                }elseif( $data->status =='checking' ){ $prog =
                                25; }elseif($data->status == 'processing'){
                                $prog = 50; }elseif($data->status ==
                                'finishing'){ $prog = 75; }elseif($data->status
                                == 'complated'){ $prog = 100; } @endphp

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
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a
                                    href="/dashboard/maintenance/status/{{ $data->slug }}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="update maintenance"
                                    ><i class="bi bi-arrow-up-left-square"></i
                                ></a>
                                <a
                                    href="/dashboard/maintenance/{{ $data->slug }}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Detail maintenance"
                                    ><i class="bi bi-eye"></i
                                ></a>
                                <a
                                    href="/dashboard/maintenance/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit maintenance"
                                    ><i class="bi bi-pencil-square"></i
                                ></a>

                                <form
                                    action="/dashboard/maintenance/{{ $data->slug }}"
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
                        </tr>
                        @endforeach @else
                        <tr>
                            <td colspan="6" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-8">
                        {{ $datas->onEachside(2)->links() }}
                    </div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
