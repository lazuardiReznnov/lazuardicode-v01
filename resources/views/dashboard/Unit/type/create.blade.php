<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit">
            Unit Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit/type">
            Type Unit Data
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Unit">
                <form
                    action="/dashboard/unit/type"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="row mb-3">
                        <label
                            for="brand"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Brand") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('brand_id') is-invalid @enderror"
                                id="brand"
                                aria-label="brand"
                                name="brand_id"
                            >
                                <option selected>Select Brand</option>
                                @foreach($brands as $brand)
                                @if(old('brand_id')==$brand->id)
                                <option value="{{ $brand->id }}" selected>
                                    {{ $brand->name }}
                                </option>
                                @else
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('brand_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="category_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Category") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('category_id') is-invalid @enderror"
                                id="category"
                                aria-label="category_id"
                                name="category_id"
                            >
                                <option selected>Select Category</option>
                                @foreach($categories as $category)
                                @if(old('category_id')==$category->id)
                                <option value="{{ $category->id }}" selected>
                                    {{ $category->name }}
                                </option>
                                @else
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('category_id')
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
                            >{{ __("Type Name") }}</label
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
                                value="{{ old('slug') }}"
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
                            for="description"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("description") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="description"
                                type="hidden"
                                name="description"
                            />
                            <trix-editor input="description"></trix-editor>

                            @error('description')
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
    @push('script2')

    <script>
        //  slug alternatif`

        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");
        const link = "/dashboard/unit/checkSlug?name=";

        makeslug(name, slug, link);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>
    <script src="/asset/js/trix.js"></script>

    @endpush @push('css')
    <link rel="stylesheet" href="/asset/css/trix.css" />
    @endpush
</x-admin-layout>
