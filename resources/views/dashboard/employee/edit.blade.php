<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/employee">
            Employee
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/employee/detail/{{ $data->slug }}">
            {{$data->slug}}
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Form Unit">
                <form
                    action="/dashboard/employee/{{ $data->slug }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')

                    <input
                        type="hidden"
                        name="department_id"
                        value="{{ $data->department_id }}"
                    />
                    <input
                        type="hidden"
                        name="department_slug"
                        value="{{ $data->department->slug }}"
                    />
                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >

                        <div class="col-md-6">
                            @if($data->pic)
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $data->pic }}"
                            />
                            <img
                                src="{{ asset('storage/'. $data->pic) }}"
                                class="d-block img-fluid mb-2 col-sm-5"
                            />
                            @else
                            <img
                                width="200"
                                class="img-preview img-fluid mb-2"
                                alt=""
                            />
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
                                value="{{ old('name', $data->name) }}"
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
                            for="position"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Position") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('position_id') is-invalid @enderror"
                                id="position"
                                aria-label="position"
                                name="position_id"
                            >
                                <option selected>Select Positions</option>
                                @foreach($positions as $position)
                                @if(old('position_id',$data->position_id)==$position->id)
                                <option value="{{ $position->id }}" selected>
                                    {{ $position->name }}
                                </option>
                                @else
                                <option value="{{ $position->id }}">
                                    {{ $position->name }}
                                </option>
                                @endif @endforeach
                            </select>

                            @error('position_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="idCard"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Id Card") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="idCard"
                                type="text"
                                class="form-control @error('idCard') is-invalid @enderror"
                                name="idCard"
                                value="{{ old('idCard',$data->idCard) }}"
                                required
                                autocomplete="idCard"
                                autofocus
                            />
                            @error('idCard')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="gender"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Gender") }}</label
                        >

                        <div class="col-md-6">
                            <select
                                class="form-select @error('gender') is-invalid @enderror"
                                id="gender"
                                aria-label="gender"
                                name="gender"
                            >
                                <option selected>Select gender</option>

                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="email"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Email") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email', $data->email) }}"
                                required
                                autocomplete="email"
                                autofocus
                            />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="phone"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Phone") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="phone"
                                type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                name="phone"
                                value="{{ old('phone', $data->phone) }}"
                                required
                                autocomplete="phone"
                                autofocus
                            />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label
                            for="address"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Address") }}</label
                        >

                        <div class="col-md-6">
                            <textarea
                                class="form-control"
                                id="address"
                                name="address"
                                rows="3"
                                >{{ old("address", $data->address) }}</textarea
                            >

                            @error('address')
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
                            >{{ __("Joint Date") }}</label
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
        const link = "/dashboard/employee/checkSlug?name=";

        makeslug(name, slug, link);
    </script>

    @endpush @push('script')
    <script src="/asset/js/lazuardicode.js"></script>

    @endpush
</x-admin-layout>
