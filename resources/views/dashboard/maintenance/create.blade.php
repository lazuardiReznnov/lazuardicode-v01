<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance">
            Maintenance Management
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Maintenance Data">
                <form action="/dashboard/maintenance" method="post">
                    @csrf

                    <div class="row mb-3">
                        <label
                            for="unit_id"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("unit") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('unit_id') is-invalid @enderror"
                                id="unit_id"
                                aria-label="unit_id"
                                name="unit_id"
                            >
                                <option selected>Select Part</option>
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
                            for="name"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Request Repaired") }}</label
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
                            for="finish"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Estimate Finish Date") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="finish"
                                type="date"
                                class="form-control @error('finish') is-invalid @enderror"
                                name="finish"
                                value="{{ old('finish') }}"
                                required
                                autocomplete="finish"
                                autofocus
                            />

                            @error('finish')
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
                            >{{ __("description Damage") }}</label
                        >

                        <div class="col-md-6">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="description"
                                name="description"
                                >{{ old("description") }}</textarea
                            >

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="instruction"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Repair Instruction") }}</label
                        >

                        <div class="col-md-6">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="instruction"
                                name="instruction"
                                >{{ old("instruction") }}</textarea
                            >

                            @error('instruction')
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
