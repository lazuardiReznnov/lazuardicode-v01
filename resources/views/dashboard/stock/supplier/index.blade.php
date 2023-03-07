<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock management
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
            <x-card header="supplier Data">
                <div class="row my-2">
                    <div class="col-md">
                        <a
                            href="/dashboard/stock/supplier/create"
                            class="btn btn-primary btn-sm"
                            >Add Supplier</a
                        >
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>

                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tlp</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($datas->count()) @foreach($datas as $data)
                        <tr>
                            <th scope="row">
                                {{ ($datas->currentpage()-1) * $datas->perpage() + $loop->index + 1 }}
                            </th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->tlp }}</td>
                            <td>{!! $data->address !!}</td>

                            <td>
                                <a
                                    href="/dashboard/stock/supplier/{{ $data->slug }}"
                                    class="badge bg-success"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Detail Supplier"
                                    ><i class="bi bi-eye"></i
                                ></a>
                                <a
                                    href="/dashboard/stock/supplier/{{ $data->slug }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit stock"
                                    ><i class="far fa-edit"></i
                                ></a>
                                |
                                <form
                                    action="/dashboard/stock/supplier/{{ $data->slug }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger border-0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete stock"
                                        onclick="return confirm('are You sure ??')"
                                    >
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach @else
                        <tr>
                            <td colspan="4" class="text-center">
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
