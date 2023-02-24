<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>

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

    <!-- Tombol -->
    <div class="row">
        <div class="col-md-6 my-3">
            <a
                href="/dashboard/maintenance/create"
                class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-plus"></i
            ></a>
        </div>
    </div>
    <!-- EndTombol -->

    <div class="row">
        <div class="col-md-10"></div>
    </div>
</x-admin-layout>
