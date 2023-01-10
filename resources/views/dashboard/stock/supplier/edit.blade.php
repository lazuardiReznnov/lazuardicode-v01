<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/supplier">
            Supplier management
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Supplier">
                <form
                    action="/dashboard/stock/supplier/{{ $data->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')

                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Pic") }}</label
                        >

                        <div class="col-md-6">
                            @if($data->pic)
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $data->pic }}"
                            />
                            <img
                                src="{{ asset('storage/'. $data->pic) }}"
                                class="d-block img-fluid mb-2 col-sm-5"
                            />
                            @else
                            <img class="img-preview img-fluid mb-2 col-sm-5" />
                            @endif

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
                            >{{ __("Store Name") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name',$data->name) }}"
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

                    <div class="row mb-3">
                        <label
                            for="slug"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Slug") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="slug"
                                type="text"
                                class="form-control @error('slug') is-invalid @enderror"
                                name="slug"
                                value="{{ old('slug', $data->slug) }}"
                                required
                                autocomplete="slug"
                                autofocus
                            />

                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="tlp"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("tlp") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="tlp"
                                type="text"
                                class="form-control @error('tlp') is-invalid @enderror"
                                name="tlp"
                                value="{{ old('tlp',$data->tlp) }}"
                                required
                                autocomplete="tlp"
                                autofocus
                            />
                            @error('tlp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label
                            for="email"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Email Address") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email',$data->email) }}"
                                required
                                autocomplete="email"
                            />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label
                            for="address"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Address") }}</label
                        >

                        <div class="col-md-6">
                            <input id="address" type="hidden" name="address" />
                            <trix-editor input="address"
                                >{!! old('address',$data->address)
                                !!}</trix-editor
                            >

                            @error('address')
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
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
    @push('script2')

    <script>
        //  slug alternatif`

        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");
        const link = "/dashboard/stock/supplier/checkSlug?name=";

        makeslug(name, slug, link);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>
    <script src="/asset/js/trix.js"></script>
    @endpush @push('css')
    <link rel="stylesheet" href="/asset/css/trix.css" />
    @endpush
</x-admin-layout>
