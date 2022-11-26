<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/home"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/home/authentication"
            >Authentication
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-6">
            <x-card header="Form Add Role">
                <form action="/dashboard/authentication" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="role" value="{{ $role }}" />
                        <label for="name" class="form-label">Permission</label>

                        <select
                            class="form-select"
                            aria-label="Default select example"
                            name="permission"
                        >
                            <option selected>Cholce The Permission</option>
                            @foreach($datas as $data)

                            <option value="{{ $data->name }}">
                                {{ $data->name }}
                            </option>

                            @endforeach
                        </select>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <button class="btn btn-primary" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
