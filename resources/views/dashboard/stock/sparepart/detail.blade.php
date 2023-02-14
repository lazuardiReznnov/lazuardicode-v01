<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/sparepart">
            Sparepart
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
    <div class="row my-2">
        <div class="col-md">
            <div class="btn-group">
                <a
                    href="/dashboard/stock/sparepart/add/{{ $type->slug }}"
                    class="btn btn-primary btn-sm"
                    ><i class="bi bi-file-plus"></i
                ></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <x-card header="Sparepart Data">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Category</th>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">brand</th>
                            <th scope="col">Code Part</th>

                            <th scope="col">Action</th>
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
                            <td>{{ $data->CategoryPart->name }}</td>
                            <td>
                                {{ $data->type->brand->name }} -
                                {{ $data->type->name }}
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->brand }}</td>
                            <td>{{ $data->codepart }}</td>

                            <td>
                                <a
                                    href="/dashboard/stock/sparepart/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit stock"
                                    ><i class="far fa-edit"></i
                                ></a>
                                |
                                <form
                                    action="/dashboard/stock/sparepart/{{ $data->slug }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger border-0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete sparepart"
                                        onclick="return confirm('are You sure ??')"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach @else
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            {{ $datas->links() }}
        </div>
    </div>
</x-admin-layout>
