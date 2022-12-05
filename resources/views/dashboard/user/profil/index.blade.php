<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/user"> User </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-8">
            @if(session()->has('loginError'))
            <x-card>
                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >
                    {{ session("loginError") }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="close"
                    ></button>
                </div>
            </x-card>
            @endif @if(session()->has('success'))
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

    <div class="row">
        <div class="col-md-10">
            <x-card header="profil">
                <form
                    action="/dashboard/user/profil/{{ $data->user->username }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label">{{
                            __("Phone")
                        }}</label>

                        <div class="col-md-6">
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
                        <label for="name" class="col-md-4 col-form-label">{{
                            __("Address")
                        }}</label>

                        <div class="col-md-6">
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
                        <label for="job" class="col-md-4 col-form-label">{{
                            __("Job")
                        }}</label>

                        <div class="col-md-6">
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
                        <label for="word" class="col-md-4 col-form-label">{{
                            __("word")
                        }}</label>

                        <div class="col-md-6">
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

                    <div class="row mb-3">
                        <label for="pic" class="col-md-4 col-form-label">{{
                            __("Picture")
                        }}</label>

                        <div class="col-md-6">
                            @if($data->pic)
                            <img
                                width="200"
                                src="{{ asset('storage/'. $data->pic) }}"
                                class="img-preview img-fluid mb-2 d-block"
                                alt="about Image"
                            />
                            <input
                                type="hidden"
                                name="old_pic"
                                value="{{ $data->pic }}"
                            />
                            @else
                            <img
                                width="200"
                                class="img-preview img-fluid mb-2"
                                alt=""
                            />
                            @endif
                            <input
                                class="form-control form-control-sm @error('pic') is-invalid @enderror"
                                id="pic"
                                type="file"
                                name="pic"
                                onchange="previewImage()"
                            />
                            @error('pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="twitter" class="col-md-4 col-form-label"
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
                        <label for="facebook" class="col-md-4 col-form-label"
                            ><i class="fab fa-facebook"></i>
                            {{ __("Facebook") }}</label
                        >

                        <div class="col-md-6">
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
                        <label for="linkedin" class="col-md-4 col-form-label"
                            ><i class="fab fa-linkedin"></i>
                            {{ __("Linkedin") }}</label
                        >

                        <div class="col-md-6">
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
                        <label for="instagram" class="col-md-4 col-form-label"
                            ><i class="fab fa-instagram"></i>
                            {{ __("Instagram") }}</label
                        >

                        <div class="col-md-6">
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
                            <button type="submit" class="btn btn-primary">
                                {{ __("Update") }}
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
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
