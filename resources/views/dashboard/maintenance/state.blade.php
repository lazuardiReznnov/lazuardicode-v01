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
            <x-card header="Update States">
                <form
                    action="/dashboard/maintenance/state/{{ $data->slug }}"
                    method="post"
                >
                    @csrf @method('put')

                    <div class="row mb-3">
                        <label
                            for="state"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("State") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('unit_id') is-invalid @enderror"
                                id="status"
                                aria-label="status"
                                name="status"
                            >
                                <option selected>Select State</option>
                                @foreach($states as $state)
                                @if(old('state',$data->status)==$state)
                                <option value="{{ $state }}" selected>
                                    {{ $state }}
                                </option>
                                @else
                                <option value="{{ $state }}">
                                    {{ $state }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('state')
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
                                update
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
