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
        <div class="col-md-4 my-3">
            <a href="/dashboard/unit/create" class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-plus"></i
            ></a>
            <a href="/dashboard/unit/create-excl" class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-spreadsheet-fill"></i
            ></a>
        </div>
        <div class="col-md-6 my-3">
            <form action="/dashboard/unit" method="get">
                <div class="col-md col-md-end">
                    <div class="input-group">
                        <input
                            type="text"
                            aria-label="name"
                            class="form-control"
                            name="name"
                        />
                        <select
                            class="form-select"
                            id="flag_id"
                            aria-label="flag"
                            name="flag"
                        >
                            <option value="" selected>Choose Flag...</option>
                            @foreach($flags as $flag)
                            <option value="{{ $flag->id }}">
                                {{ $flag->name }}
                            </option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- EndTombol -->
    <!-- content -->
    <div class="row">
        <div class="col-md-10">
            <x-card header="List Unit">
                <table id="table" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>No Registration</th>
                            <th>Brand/Type</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if($datas->count()) @foreach($datas as $data)

                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>

                            <td>{{ $data->name }}</td>
                            <td>
                                {{ $data->type->brand->name }}
                                {{ $data->type->name }}
                            </td>
                            <td>
                                {{ $data->type->category->name }}
                            </td>

                            <td>
                                <a
                                    href="/dashboard/unit/{{ $data->slug }}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Detail User"
                                    ><i class="bi bi-eye"></i
                                ></a>
                                <a
                                    href="/dashboard/unit/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit Unit"
                                    ><i class="bi bi-pencil-square"></i
                                ></a>

                                <form
                                    action="/dashboard/unit/{{ $data->slug }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete Unit"
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
    <!-- endcontent -->
</x-admin-layout>
