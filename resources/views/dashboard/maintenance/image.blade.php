<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }} : {{ $data->unit->name }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance">
            maintenance Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance/{{ $data->slug }}">
            {{ $data->unit->name }}
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <!-- Pesan -->
    <div class="row">
        <div class="col-md-10">
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
    <!-- endPesan -->

    <x-card>
        <div class="btn-group mb-4">
            <a
                href="/dashboard/maintenance/image/create/{{ $data->slug }}"
                class="btn btn-primary mb-3"
                >Add Image</a
            >
        </div>
        <h4>Maintenance Picture</h4>
        <hr />
        @if($images->count())
        <div class="row">
            @foreach($images as $pic)
            <div class="col-sm-4">
                <div class="card mb-3 shadow d-flex">
                    <img
                        width="200"
                        src="{{ asset('storage/'. $pic->pic) }}"
                        class="my-3 d-block mx-auto"
                        alt="{{ $pic->name }}"
                    />
                    <p class="text-center fw-bold">
                        {{ $pic->name }}
                    </p>
                    <form
                        action="/dashboard/maintenance/image/{{ $data->slug }}"
                        method="post"
                        class="d-inline"
                    >
                        <input type="hidden" name="id" value="{{ $pic->id }}" />
                        @method('delete') @csrf
                        <button
                            class="badge bg-danger"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete Image Unit"
                            onclick="return confirm('are You sure ??')"
                        >
                            <i class="bi bi-file-x-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <p class="fw-bold">Data Masih Kosong</p>
        @endif
    </x-card>
</x-admin-layout>
