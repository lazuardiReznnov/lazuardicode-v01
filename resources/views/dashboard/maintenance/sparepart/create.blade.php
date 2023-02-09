<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance">
            Maintenance Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance/{{ $data->slug }}">
            {{ $data->slug }}
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form sparepart">
                <form action="/dashboard/maintenance/part" method="post">
                    @csrf

                    <input
                        type="hidden"
                        name="maintenance_id"
                        value="{{ $data->id }}"
                    />
                    <input
                        type="hidden"
                        name="maintenance_slug"
                        value="{{ $data->slug }}"
                    />

                    <div class="row mb-3">
                        <label
                            for="sparepart_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("sparepart") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('sparepart_id') is-invalid @enderror"
                                id="sparepart_id"
                                aria-label="sparepart_id"
                                name="sparepart_id"
                            >
                                <option selected>Select Part</option>
                                @foreach($spareparts as $sparepart)
                                @if(old('sparepart_id')==$sparepart->id)
                                <option value="{{ $sparepart->id }}" selected>
                                    {{ $sparepart->type->name }} -
                                    {{ $sparepart->name }}
                                </option>
                                @else
                                <option value="{{ $sparepart->id }}">
                                    {{ $sparepart->type->name }} -
                                    {{ $sparepart->name }}
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
                            for="qty"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Qty") }}</label
                        >

                        <div class="col-md-2">
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
