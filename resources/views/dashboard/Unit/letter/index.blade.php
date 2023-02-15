<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit"> Unit </x-breadcrumb-link>

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

    <div class="row mb-5">
        <div class="col-md-10">
            <a href="/dashboard/unit/letter/create" class="btn btn-primary">
                <i class="bi bi-file-earmark-plus-fill"></i>
            </a>
            <a
                href="/dashboard/unit/letter/create-excl"
                class="btn btn-primary"
            >
                <i class="bi bi-file-earmark-spreadsheet"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <x-card header="Letter">
                <div class="row">
                    @foreach($data as $cat)
                    <div class="col-xl">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h4 class="fs-6 text-uppercase text-center">
                                    {{ $cat->name }}
                                </h4>
                                <p>{{ $cat->description }}</p>
                            </div>
                            <div
                                class="card-footer d-flex align-items-center justify-content-between"
                            >
                                <a
                                    class="small text-white stretched-link"
                                    href="/dashboard/unit/letter/data/{{ $cat->slug }}"
                                    >View Details</a
                                >
                                <div class="small text-white">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </x-card>
        </div>
    </div>
</x-admin-layout>
