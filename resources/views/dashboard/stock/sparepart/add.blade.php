<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/sparepart">
            sparepart
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Sparepart">
                <form
                    action="/dashboard/stock/sparepart/storepart"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input
                        type="hidden"
                        name="type_id"
                        value="{{ $type->id }}"
                    />
                    <input
                        type="hidden"
                        name="type_slug"
                        value="{{ $type->slug }}"
                    />

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
                            for="category_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Category Sparepart") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('category_part_id') is-invalid @enderror"
                                id="category_part_id"
                                aria-label="category_part_id"
                                name="category_part_id"
                            >
                                <option selected>
                                    Select Category Sparepart
                                </option>
                                @foreach($catparts as $cat)
                                @if(old('category_part_id')==$cat->id)
                                <option value="{{ $cat->id }}" selected>
                                    {{ $cat->name }}
                                </option>
                                @else
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('cat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="brand"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("brand") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="brand"
                                type="text"
                                class="form-control @error('brand') is-invalid @enderror"
                                name="brand"
                                value="{{ old('brand') }}"
                                required
                                autocomplete="brand"
                                autofocus
                            />
                            @error('brand')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="codepart"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("codepart") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="codepart"
                                type="text"
                                class="form-control @error('codepart') is-invalid @enderror"
                                name="codepart"
                                value="{{ old('codepart') }}"
                                required
                                autocomplete="codepart"
                                autofocus
                            />
                            @error('codepart')
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
        const link = "/dashboard/stock/sparepart/checkSlug?name=";

        makeslug(name, slug, link);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>

    @endpush
</x-admin-layout>
