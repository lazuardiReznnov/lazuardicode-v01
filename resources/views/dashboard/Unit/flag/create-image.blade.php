<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit/{{ $data->slug }}">
            {{ $data->name }}
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Create Via excl">
                <form
                    action="/dashboard/unit/flag/image"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >
                        <input
                            type="hidden"
                            name="flag_id"
                            value="{{ $data->id }}"
                        />

                        <input
                            type="hidden"
                            name="flag_slug"
                            value="{{ $data->slug }}"
                        />

                        <div class="col-md-6">
                            <img
                                width="200"
                                class="img-preview img-fluid mb-2"
                                alt=""
                            />

                            <input
                                id="pic"
                                type="file"
                                class="form-control @error('pic') is-invalid @enderror"
                                name="pic"
                                value="{{ old('pic') }}"
                                onchange="previewImage()"
                                autocomplete="pic"
                                autofocus
                            />

                            @error('pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="name"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Title") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                            />

                            @error('name')
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
                                Upload
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
    @push('script')
    <script src="/asset/js/lazuardicode.js"></script>

    @endpush
</x-admin-layout>
