<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/stock">
            Stock management
        </x-breadcrumb-link>

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
    <div class="row my-2">
        <div class="col-md">
            <div class="btn-group">
                <a
                    href="/dashboard/stock/sparepart/create-excl"
                    class="btn btn-primary btn-sm"
                    ><i class="bi bi-file-plus"></i
                ></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <x-card header="Sparepart Data">
                <div class="row">
                    @foreach($datas as $data)
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                {{ $data->brand->name }}<br />
                                {{ $data->name}}
                            </div>
                            <div
                                class="card-footer d-flex align-items-center justify-content-between"
                            >
                                <a
                                    class="small text-white stretched-link"
                                    href="/dashboard/stock/sparepart/detail/{{ $data->slug }}"
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

    <div class="row">
        <div class="col-md-8">
            {{ $datas->links() }}
        </div>
    </div>
</x-admin-layout>
