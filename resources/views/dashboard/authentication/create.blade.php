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
                <form action="/dashboard/authentication/role" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Role</label>
                        <!-- <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Name Role"
                            name="name"
                        /> -->
                        <select
                            class="form-select"
                            id="multiple-select-field"
                            data-placeholder="Choose anything"
                            multiple
                        >
                            <option>Christmas Island</option>
                            <option>South Sudan</option>
                            <option>Jamaica</option>
                            <option>Kenya</option>
                            <option>French Guiana</option>
                            <option>Mayotta</option>
                            <option>Liechtenstein</option>
                            <option>Denmark</option>
                            <option>Eritrea</option>
                            <option>Gibraltar</option>
                            <option>
                                Saint Helena, Ascension and Tristan da Cunha
                            </option>
                            <option>Haiti</option>
                            <option>Namibia</option>
                            <option>
                                South Georgia and the South Sandwich Islands
                            </option>
                            <option>Vietnam</option>
                            <option>Yemen</option>
                            <option>Philippines</option>
                            <option>Benin</option>
                            <option>Czech Republic</option>
                            <option>Russia</option>
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
        $("#multiple-select-field").select2({
            theme: "bootstrap-5",
            width: $(this).data("width")
                ? $(this).data("width")
                : $(this).hasClass("w-100")
                ? "100%"
                : "style",
            placeholder: $(this).data("placeholder"),
            closeOnSelect: false,
        });
    </script>
</x-admin-layout>
