<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Role"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/home"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link-active> Role </x-breadcrumb-link-active>
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
        <div class="col-md-6">
            <x-card header="Role List">
                <div class="row my-2">
                    <div class="col-md">
                        <a
                            href="/dashboard/permission/role/create"
                            class="btn btn-primary btn-sm"
                            >Add Role</a
                        >
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role Name</th>
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
                            <td>edit|delete</td>
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
