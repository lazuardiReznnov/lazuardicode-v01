<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Role"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/home"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/home/dashboard/permission/permission">
            Permission
        </x-breadcrumb-link>
        <x-breadcrumb-link-active> {{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-6">
            <x-card header="Form Add Permission">
                <form action="/dashboard/permission/permission" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Permission</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Name Role"
                            name="name"
                        />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <button class="btn btn-primary" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
