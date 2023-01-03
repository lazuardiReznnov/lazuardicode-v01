<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/unit"> Letter </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>
    <x-card header="Letter">
        <div class="row">
            @foreach($data as $cat)
            <div class="col-xl-4 col-md-6">
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
</x-admin-layout>
