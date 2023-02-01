<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit"> Unit </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Letter">
                <form
                    action="/dashboard/unit/letter"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end align-items-center"
                            >{{ __("pic") }}</label
                        >

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
                            for="category"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("category") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('category_id') is-invalid @enderror"
                                id="category"
                                aria-label="category_id"
                                name="category_letter_id"
                            >
                                <option selected>Select category</option>
                                @foreach($categorys as $category)
                                @if(old('category_letter_id')==$category->id)
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
                            for="unit"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Unit") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('unit_id') is-invalid @enderror"
                                id="unit"
                                aria-label="unit_id"
                                name="unit_id"
                            >
                                <option selected>Select unit</option>
                                @foreach($units as $unit)
                                @if(old('unit_id')==$unit->id)
                                <option value="{{ $unit->id }}" selected>
                                    {{ $unit->name }}
                                </option>
                                @else
                                <option value="{{ $unit->id }}">
                                    {{ $unit->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('unit_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="regNum"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Registration Number") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="regNum"
                                type="text"
                                class="form-control @error('regNum') is-invalid @enderror"
                                name="regNum"
                                value="{{ old('regNum') }}"
                                required
                                autocomplete="regNum"
                                placeholder="Registration Number Letter"
                                autofocus
                            />

                            @error('regNum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="owner"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Ownership Name") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="owner"
                                type="text"
                                class="form-control @error('owner') is-invalid @enderror"
                                name="owner"
                                value="{{ old('owner') }}"
                                required
                                autocomplete="owner"
                                placeholder="Owner Unit Description"
                                autofocus
                            />

                            @error('owner')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="owner_add"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Ownership Address") }}</label
                        >

                        <div class="col-md-6">
                            <textarea
                                name="owner_add"
                                id=""
                                cols="30"
                                rows="10"
                                class="form-control @error('owner_add') is-invalid @enderror"
                            >
                                {{ old("owner_add") }}
                            </textarea>

                            @error('owner_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label
                            for="reg_year"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("registration year") }}</label
                        >

                        <div class="col-md-6">
                            @php $now = date('Y'); @endphp
                            <select name="reg_year" class="form-select">
                                <option selected>--Choice reg_Year--</option>
                                @for ($a=2012;$a<=$now;$a++)
                                <option value="{{ $a }}">{{ $a }}</option>
                                @endfor
                            </select>
                            @error('reg_year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="loc_code"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Location Code") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="loc_code"
                                type="text"
                                class="form-control @error('loc_code') is-invalid @enderror"
                                name="loc_code"
                                value="{{ old('loc_code') }}"
                                required
                                autocomplete="loc_code"
                                placeholder="Location Code of Registration Unit"
                                autofocus
                            />

                            @error('loc_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="lpc"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("License Plate Color") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="lpc"
                                type="text"
                                class="form-control @error('lpc') is-invalid @enderror"
                                name="lpc"
                                value="{{ old('lpc') }}"
                                required
                                autocomplete="lpc"
                                placeholder="License Plate Color Unit"
                                autofocus
                            />

                            @error('lpc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="vodn"
                            class="col-md-4 col-form-label text-md-end"
                            >{{
                                __("Vehicle Ownership Document Number")
                            }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="vodn"
                                type="text"
                                class="form-control @error('vodn') is-invalid @enderror"
                                name="vodn"
                                value="{{ old('vodn') }}"
                                required
                                autocomplete="vodn"
                                placeholder="Vehicle Ownership Document Number"
                                autofocus
                            />

                            @error('vodn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="tax"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Tax") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="tax"
                                type="date"
                                class="form-control @error('tax') is-invalid @enderror"
                                name="tax"
                                value="{{ old('tax') }}"
                                required
                                autocomplete="tax"
                                autofocus
                            />
                            @error('tax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="expire_date"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Expire date") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="expire_date"
                                type="date"
                                class="form-control @error('expire_date') is-invalid @enderror"
                                name="expire_date"
                                value="{{ old('expire_date') }}"
                                required
                                autocomplete="expire_date"
                                autofocus
                            />
                            @error('expire_date')
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

    @push('script')
    <script src="/asset/js/lazuardicode.js"></script>

    @endpush
</x-admin-layout>
