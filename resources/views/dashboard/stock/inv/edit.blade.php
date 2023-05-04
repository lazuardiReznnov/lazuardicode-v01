<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/iodata/">
            invoicement
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/invStock/{{ $data->slug }}">
            Inv Data
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Invoice">
                <form
                    action="/dashboard/stock/invStock/{{ $data->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')
                    <input type="hidden" name="month" value="{{ $month }}" />
                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >

                        <div class="col-md-6">
                            @if($data->image->pic)
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $data->image->pic }}"
                            />
                            <img
                                src="{{ asset('storage/'. $data->image->pic) }}"
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
                            for="tgl"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Date") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="tgl"
                                type="date"
                                class="form-control @error('tgl') is-invalid @enderror"
                                name="tgl"
                                value="{{ old('tgl', $data->tgl) }}"
                                required
                                autocomplete="tgl"
                                autofocus
                            />

                            @error('tgl')
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
                            >{{ __("Invoice Number") }}</label
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
                            for="slug"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Payment") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="payment"
                                type="text"
                                class="form-control @error('payment') is-invalid @enderror"
                                name="payment"
                                value="{{ old('payment',$data->payment) }}"
                                required
                                autocomplete="payment"
                                autofocus
                            />

                            @error('payment')
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
        const link = "/dashboard/stock/invStock/checkSlug?name=";

        makeslug(name, slug, link);
    </script>
    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>

    @endpush
</x-admin-layout>
