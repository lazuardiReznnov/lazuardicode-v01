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
                    action="/dashboard/page/about/{{ $data->id }}"
                    method="post"
                    enctype="multipart/form-data"
                >
                    @csrf @method('put')

                    <div class="row mb-3">
                        <label
                            for="descriptions"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Descriptions 1") }}</label
                        >

                        <div class="col-md-6">
                            <input id="desc1" type="hidden" name="desc1" />
                            <trix-editor
                                input="desc1"
                                >{{ $data->desc1 }}</trix-editor
                            >

                            @error('desc1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label
                            for="desc2"
                            class="col-md-4 col-form-label text-md-end"
                            >{{ __("Descriptions 2") }}</label
                        >

                        <div class="col-md-6">
                            <input id="desc2" type="hidden" name="desc2" />
                            <trix-editor
                                input="desc2"
                                >{{ $data->desc2 }}</trix-editor
                            >

                            @error('desc2')
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
