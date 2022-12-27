<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/page">
            Page Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/page/portofolio">
            Portofolio Management
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Portofolio">
                <form
                    action="/dashboard/page/portofolio/{{ $data->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')

                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >

                        <div class="col-md-6">
                            @if($data->pic)
                            <img
                                width="200"
                                src="{{ asset('storage/'. $data->pic) }}"
                                class="img-preview img-fluid mb-2 d-block"
                                alt="about Image"
                            />
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $data->pic }}"
                            />
                            @else
                            <img
                                width="200"
                                class="img-preview img-fluid mb-2"
                                alt=""
                            />
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
                            >{{ __("Name") }}</label
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
                                value="{{ old('slug',$data->slug) }}"
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
                            for="body"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("body") }}</label
                        >

                        <div class="col-md-6">
                            <input id="body" type="hidden" name="body" />
                            <trix-editor
                                input="body"
                                >{{ $data->body }}</trix-editor
                            >

                            @error('body')
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
        const link = "/dashboard/page/portofolio/checkSlug?name=";

        makeslug(name, slug, link);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>
    <script src="/asset/js/trix.js"></script>
    @endpush @push('css')
    <link rel="stylesheet" href="/asset/css/trix.css" />
    @endpush
</x-admin-layout>
