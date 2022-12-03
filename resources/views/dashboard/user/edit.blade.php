<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/user"> User </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md-10">
            <x-card header="form Edit User">
                <form method="POST" action="/dashboard/user">
                    @csrf @method('put')

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
                            for="username"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("username") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="username"
                                type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                name="username"
                                value="{{ old('username',$data->name) }}"
                                required
                                autocomplete="username"
                                autofocus
                            />

                            @error('username')
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
                            >{{ __("Email Address") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email',$data->email) }}"
                                required
                                autocomplete="email"
                            />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __("Upadate") }}
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <x-card header="Change Password User">
                <form method="POST" action="/dashboard/user">
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
                                type="current_password"
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
                            <button type="submit" class="btn btn-primary">
                                {{ __("Upadate") }}
                            </button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-admin-layout>
