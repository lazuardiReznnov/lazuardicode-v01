<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/iodata">
            invoicement
        </x-breadcrumb-link>
        <x-breadcrumb-link
            link="/dashboard/stock/invStock/{{ $invStock->supplier->slug }}"
        >
            Inv Data
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock/detail/{{ $invStock->slug }}">
            Invoice
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Invoice">
                <form
                    action="/dashboard/stock"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="inv_stock_id"
                        value="{{ $invStock->id }}"
                    />
                    <input
                        type="hidden"
                        name="inv_stock_slug"
                        value="{{ $invStock->slug }}"
                    />

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
                                value="{{ old('tgl') }}"
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
                            for="sparepart_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Sparepart") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('sparepart_id') is-invalid @enderror"
                                id="sparepart_id"
                                aria-label="sparepart_id"
                                name="sparepart_id"
                            >
                                <option selected>Select Part</option>
                                @foreach($sparepart as $part)
                                @if(old('sparepart_id')==$part->id)
                                <option value="{{ $part->id }}" selected>
                                    {{ $part->categoryPart->name }} -
                                    {{ $part->type->name }} -
                                    {{ $part->name }}
                                </option>
                                @else
                                <option value="{{ $part->id }}">
                                    {{ $part->categoryPart->name }} -
                                    {{ $part->type->name }} -
                                    {{ $part->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('sparepart_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="qty"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Qty") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="qty"
                                type="text"
                                class="form-control @error('qty') is-invalid @enderror"
                                name="qty"
                                value="{{ old('qty') }}"
                                required
                                autocomplete="qty"
                                autofocus
                            />

                            @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="price"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Price") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="price"
                                type="text"
                                class="form-control @error('price') is-invalid @enderror"
                                name="price"
                                value="{{ old('price') }}"
                                required
                                autocomplete="price"
                                autofocus
                            />

                            @error('price')
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
