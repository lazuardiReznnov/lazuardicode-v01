<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="Role"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link-active> Role </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-6">
            <x-card header="Form Edit Role">
                <form
                    action="/dashboard/Authentication/role/{{ $data->id }}"
                    method="post"
                >
                    @csrf @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Role</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Name Role"
                            name="name"
                            value="{{ old('name', $data->name) }}"
                        />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <button class="btn btn-primary" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
