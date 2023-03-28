<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/user"> User </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-8">
            @if(session()->has('success'))
            <x-card>
                <!-- pesan -->

                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    {{ session("success") }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="close"
                    ></button>
                </div>

                <!-- endpesan -->
            </x-card>
            @endif
        </div>
    </div>
    <div class="btn-group mb-3">
        <a
            href="/dashboard/user/profil/image/{{ $data->user->username }}"
            class="btn btn-primary"
            ><i class="bi bi-upload"></i
        ></a>

        <form
            action="/dashboard/user/profil/{{ $data->user->username }}"
            method="post"
            class="d-inline"
        >
            @method('delete') @csrf
            <button
                class="btn btn-danger"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Delete employee"
                onclick="return confirm('are You sure ??')"
            >
                <i class="bi bi-file-x-fill"></i>
            </button>
        </form>
    </div>
    <x-card header="profil">
        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    @if($user->image)
                    <img
                        width="100"
                        src="{{ asset('storage/'. $user->image->pic) }}"
                        class="rounded-circle mx-auto d-block shadow my-3"
                        alt="about Image"
                    />
                    <form
                        action="/dashboard/employee/image/{{ $data->slug }}"
                        method="post"
                        class="d-inline"
                    >
                        <input
                            type="hidden"
                            name="id"
                            value="{{ $data->image->id }}"
                        />
                        @method('delete') @csrf
                        <button
                            class="badge bg-danger"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete Image Employee"
                            onclick="return confirm('are You sure ??')"
                        >
                            <i class="bi bi-file-x-fill"></i>
                        </button>
                    </form>
                    @else
                    <img
                        class="rounded-circle mx-auto d-block shadow my-3"
                        src="http://source.unsplash.com/200x200?truck"
                        alt=""
                        width="100"
                    />
                    @endif

                    <p class="text-center">{{ $data->user->name }}</p>
                </div>
            </div>
            <div class="col-md-7 col-md-end">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button
                            class="nav-link active"
                            id="nav-profile-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-profile"
                            type="button"
                            role="tab"
                            aria-controls="nav-profile"
                            aria-selected="false"
                        >
                            Profile
                        </button>
                        <button
                            class="nav-link"
                            id="nav-editprofil-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-editprofil"
                            type="button"
                            role="tab"
                            aria-controls="nav-editprofil"
                            aria-selected="false"
                        >
                            Edit Profil
                        </button>
                        <button
                            class="nav-link"
                            id="nav-editpassword-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-editpassword"
                            type="button"
                            role="tab"
                            aria-controls="nav-editpassword"
                            aria-selected="false"
                        >
                            Edit Password
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div
                        class="tab-pane show active"
                        id="nav-profile"
                        role="tabpanel"
                        aria-labelledby="nav-profile-tab"
                        tabindex="0"
                    ></div>
                    <div
                        class="tab-pane fade"
                        id="nav-editprofil"
                        role="tabpanel"
                        aria-labelledby="nav-editprofil-tab"
                        tabindex="0"
                    >
                        <form
                            action="/dashboard/user/profil/{{ $data->user->username }}"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            @csrf @method('put')
                            <div class="row mb-3 mt-3">
                                <label
                                    for="name"
                                    class="col-md-4 col-form-label"
                                    >{{ __("Phone") }}</label
                                >

                                <div class="col-md-8">
                                    <input
                                        id="phone"
                                        type="text"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        name="phone"
                                        value="{{ old('name',$data->phone) }}"
                                        required
                                        autocomplete="phone"
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
                                    for="name"
                                    class="col-md-4 col-form-label"
                                    >{{ __("Address") }}</label
                                >

                                <div class="col-md-8">
                                    <textarea
                                        class="form-control @error('address') is-invalid @enderror"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        autocomplete="address"
                                        name="address"
                                        >{{ old('address', $data->address) }}</textarea
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
                                    for="job"
                                    class="col-md-4 col-form-label"
                                    >{{ __("Job") }}</label
                                >

                                <div class="col-md-8">
                                    <input
                                        id="job"
                                        type="text"
                                        class="form-control @error('job') is-invalid @enderror"
                                        name="job"
                                        value="{{ old('job',$data->job) }}"
                                        required
                                        autocomplete="job"
                                        autofocus
                                    />

                                    @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="word"
                                    class="col-md-4 col-form-label"
                                    >{{ __("word") }}</label
                                >

                                <div class="col-md-8">
                                    <textarea
                                        class="form-control @error('word') is-invalid @enderror"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        autocomplete="word"
                                        name="word"
                                        >{{ old('word', $data->word) }}</textarea
                                    >

                                    @error('word')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-8">
                                <label
                                    for="twitter"
                                    class="col-md-4 col-form-label"
                                    ><i class="fab fa-twitter"></i>
                                    {{ __("Twitter") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="twitter"
                                        type="text"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        name="twitter"
                                        value="{{ old('twitter',$data->twitter) }}"
                                        required
                                        autocomplete="twitter"
                                        autofocus
                                    />

                                    @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="facebook"
                                    class="col-md-4 col-form-label"
                                    ><i class="fab fa-facebook"></i>
                                    {{ __("Facebook") }}</label
                                >

                                <div class="col-md-8">
                                    <input
                                        id="facebook"
                                        type="text"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        name="facebook"
                                        value="{{ old('facebook',$data->facebook) }}"
                                        required
                                        autocomplete="facebook"
                                        autofocus
                                    />

                                    @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="linkedin"
                                    class="col-md-4 col-form-label"
                                    ><i class="fab fa-linkedin"></i>
                                    {{ __("Linkedin") }}</label
                                >

                                <div class="col-md-8">
                                    <input
                                        id="linkedin"
                                        type="text"
                                        class="form-control @error('linkedin') is-invalid @enderror"
                                        name="linkedin"
                                        value="{{ old('linkedin',$data->linkedin) }}"
                                        required
                                        autocomplete="linkedin"
                                        autofocus
                                    />

                                    @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="instagram"
                                    class="col-md-4 col-form-label"
                                    ><i class="fab fa-instagram"></i>
                                    {{ __("Instagram") }}</label
                                >

                                <div class="col-md-8">
                                    <input
                                        id="instagram"
                                        type="text"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        name="instagram"
                                        value="{{ old('instagram',$data->instagram) }}"
                                        required
                                        autocomplete="instagram"
                                        autofocus
                                    />

                                    @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        {{ __("Update") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="nav-editpassword"
                        role="tabpanel"
                        aria-labelledby="nav-editpassword-tab"
                        tabindex="0"
                    >
                        <form
                            method="POST"
                            action="/dashboard/user/updatepassword/{{ $data->username }}"
                        >
                            @csrf @method('put')

                            <div class="row mb-3">
                                <label
                                    for="current_password"
                                    class="col-md-4 col-form-label text-md-end"
                                    >{{ __("Current_Password") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="current_password"
                                        type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password"
                                        required
                                        autocomplete="new-password"
                                    />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-end"
                                    >{{ __("Password") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        required
                                        autocomplete="new-password"
                                    />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end"
                                    >{{ __("Confirm Password") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        name="update_password"
                                    >
                                        {{ __("Upadate") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
    @push('script')
    <script>
        function previewImage() {
            const image = document.querySelector("#pic");
            const imgPreview = document.querySelector(".img-preview");
            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>
    @endpush
</x-admin-layout>
