<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit/category">
            Category Unit
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Create Via excl">
                <form
                    action="/dashboard/unit/category/store-excl"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="row mb-3">
                        <label
                            for="excl"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("File") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="excl"
                                type="file"
                                class="form-control @error('excl') is-invalid @enderror"
                                name="excl"
                                value="{{ old('excl') }}"
                                required
                                autocomplete="excl"
                                autofocus
                            />

                            @error('excl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 ms-1">
                        <div class="col-md text-md-end">
                            <button
                                class="btn btn-primary"
                                type="submit"
                                name="save"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
