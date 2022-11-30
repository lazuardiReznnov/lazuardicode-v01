<x-admin-layout title="{{ $title }}">
    @push('css')
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"
        rel="stylesheet"
    />
    @endpush @push('script')

    <script
        src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
        crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    @endpush

    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/User">User </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-6">
            <x-card header="Form Add Role">
                <form
                    action="/dashboard/user/storerole/{{ $data->username }}"
                    method="post"
                >
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Permission</label>

                        <select
                            class="js-example-basic-multiple form-select"
                            aria-label="Default select example"
                            name="role[]"
                            multiple="multiple"
                        >
                            @foreach($roles as $role)

                            <option value="{{ $role->name }}">
                                {{ $role->name }}
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
    <script>
        $(document).ready(function () {
            $(".js-example-basic-multiple").select2({
                placeholder: "role",
            });
        });
    </script>
</x-admin-layout>
