<x-admin-layout title="{{ $title }}">
    @push('css')
    <link rel="stylesheet" href="/asset/css/trix.css" />
    @endpush @push('script')
    <script src="/asset/js/trix.js"></script>
    <script src="/asset/js/lazuardicode.js"></script>
    @endpush
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/page">Page </x-breadcrumb-link>
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
    <div class="row">
        <div class="col-md-8">
            <x-card header="Edit Hero">
                <form
                    action="/dashboard/page/heropage/{{ $data->id }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')
                    <div class="row mb-3">
                        <label
                            for="pic"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("pic") }}</label
                        >

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
                                id="pic"
                                type="file"
                                class="form-control @error('pic') is-invalid @enderror"
                                name="pic"
                                value="{{ old('pic',$data->pic) }}"
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
                            for="heading"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Heading") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="heading"
                                type="text"
                                class="form-control @error('heading') is-invalid @enderror"
                                name="heading"
                                value="{{ old('heading',$data->heading) }}"
                                required
                                autocomplete="heading"
                                autofocus
                            />

                            @error('heading')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="title"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Title") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="title"
                                type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                name="title"
                                value="{{ old('title',$data->title) }}"
                                required
                                autocomplete="title"
                                autofocus
                            />

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="descriptions"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Descriptions") }}</label
                        >

                        <div class="col-md-6">
                            <input
                                id="descriptions"
                                type="hidden"
                                name="descriptions"
                            />
                            <trix-editor
                                input="descriptions"
                                >{{ $data->descriptions }}</trix-editor
                            >

                            @error('descriptions')
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
</x-admin-layout>
