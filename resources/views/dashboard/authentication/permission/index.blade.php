<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Permission"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/home"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/home/authentication">
            Authentication
        </x-breadcrumb-link>
        <x-breadcrumb-link-active> Permission </x-breadcrumb-link-active>
    </x-breadcrumb>
    <div class="row">
        <div class="col-md-8">
            @if(session()->has('loginError'))
            <x-card>
                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >
                    {{ session("loginError") }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="close"
                    ></button>
                </div>
            </x-card>
            @endif @if(session()->has('success'))
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
            <x-card header="Role List">
                <div class="row my-2">
                    <div class="col-md">
                        <a
                            href="/dashboard/authentication/permission/create"
                            class="btn btn-primary btn-sm"
                            >Add Permission</a
                        >
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Guarded</th>
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
                            <td>{{ $data->guard_name }}</td>
                            <td>
                                <a
                                    href="/dashboard/authentication/permission/{{ $data->id }}/edit"
                                    class="badge bg-warning"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Edit Unit"
                                    ><i class="far fa-edit"></i
                                ></a>

                                <form
                                    action="/dashboard/authentication/permission/{{ $data->id }}"
                                    method="post"
                                    class="d-inline"
                                >
                                    @method('delete') @csrf
                                    <button
                                        class="badge bg-danger border-0"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Delete Unit"
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
