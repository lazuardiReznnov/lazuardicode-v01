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
                    action="/dashboard/profil/{{ $data->user->username }}"
                    method="post"
                    enctype="multipart/form-data"
                >
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
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
