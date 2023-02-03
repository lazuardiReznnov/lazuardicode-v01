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
            <a href="/dashboard/unit/create" class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-plus"></i
            ></a>
            <a href="/dashboard/unit/create-excl" class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-spreadsheet-fill"></i
            ></a>
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
                            <th>Pic</th>
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
                            <td>
                                @if($data->pic)
                                <img
                                    width="50"
                                    src="{{ asset('storage/'. $data->pic) }}"
                                    class="rounded-circle mx-auto d-block shadow my-3"
                                    alt="Unit Image"
                                />
                                @else
                                <img
                                    class="rounded-circle mx-auto d-block shadow my-3"
                                    src="http://source.unsplash.com/200x200?truck"
                                    alt=""
                                    width="50"
                                />
                                @endif
                            </td>
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
