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
                href="/dashboard/employee/department"
                class="btn btn-sm btn-primary"
                ><i class="bi bi-file-earmark-plus"></i> Department Data</a
            >
        </div>
    </div>
    <!-- EndTombol -->

    <div class="row">
        @foreach($datas as $data)
        <div class="col-md mb-4">
            <div class="card text-center" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->name }}</h5>
                    <p class="card-text">
                        {{$data->description}}
                    </p>
                    <a
                        href="/dashboard/employee/detail/{{ $data->slug }}"
                        class="btn btn-primary"
                        >Enter</a
                    >
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-admin-layout>
