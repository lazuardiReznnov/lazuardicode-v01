<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/page">
            Page Management
        </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/page/portofolio">
            Portofolio Management
        </x-breadcrumb-link>
        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>

    <div class="row">
        <div class="col-md">
            <x-card header="Portofolio">
                <div class="row">
                    <div class="col-md mt-2 mb-3">
                        <a
                            href="/dashboard/page/portofolio"
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Back"
                            ><i class="bi bi-arrow-left-circle-fill"></i
                        ></a>
                        <a
                            href="/dashboard/page/portofolio/{{ $data->slug }}/edit"
                            class="btn btn-warning btn-sm"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Edit Portofolio"
                            ><i class="bi bi-pencil"></i
                        ></a>
                        <form
                            action="/dashboard/page/portofolio/{{ $data->slug }}"
                            method="post"
                            class="d-inline"
                        >
                            @method('delete') @csrf
                            <button
                                class="btn btn-danger btn-sm border-0"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Delete Portofolio"
                                onclick="return confirm('are You sure ??')"
                            >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @if($data->pic)
                    <div class="col-md-3 me-5 mb-2">
                        <img
                            width="300"
                            src="{{ asset('storage/'. $data->pic) }}"
                            alt=""
                        />
                    </div>
                    @endif
                    <div class="col-md-8">{!! $data->body !!}</div>
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
