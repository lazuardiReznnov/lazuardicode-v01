<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit/letter">
            Letter
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-8">
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

    <div class="row">
        <div class="col-md-10">
            <x-card header="{{ date('F') }}">
                <table id="table" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Reg Numb</th>
                            <th>id</th>
                            <th>Owner</th>
                            <th>Tax</th>
                            <th>expire Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($datas->count()) @foreach($datas as $data) @php
                        $date_now = date("Y/m/d"); @endphp

                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>
                            <td>{{ $data->unit->name }}</td>
                            <td>{{ $data->regNum }}</td>
                            <td>
                                {{ $data->owner }}
                            </td>
                            <td>
                                @if($data->tax)
                                <a
                                    href="/dashboard/unit/letter/edittax/{{ $data->slug }}"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="update Tax"
                                    class="badge bg-warning text-decoration-none fw-bold"
                                >
                                    <span
                                        class="text-{{ \Lazuardicode::expire($data->tax,$date_now) }}"
                                    >
                                        {{ \Carbon\Carbon::parse($data->tax)->format('d/m/Y') }}
                                    </span>
                                </a>
                                @else - @endif
                            </td>
                            <td>
                                <a
                                    href="/dashboard/unit/letter/editexpire/{{ $data->slug }}"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="update Tax"
                                    class="badge bg-warning text-decoration-none btn-sm fw-bold"
                                >
                                    <span
                                        class="text-{{ \Lazuardicode::expire($data->expire_date,$date_now) }}"
                                    >
                                        {{ \Carbon\Carbon::parse($data->expire_date)->format('d/m/Y') }}
                                    </span>
                                </a>
                            </td>

                            <td>
                                <a
                                    href="/dashboard/unit/letter/{{ $data->slug}}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Detail Letter"
                                    ><i class="bi bi-eye"></i
                                ></a>
                                <a
                                    href="/dashboard/unit/letter/{{ $data->slug}}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit letter"
                                    ><i class="bi bi-pencil-square"></i
                                ></a>

                                <form
                                    action="/dashboard/unit/letter/{{ $data->slug }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete Letter"
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
