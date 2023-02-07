<x-admin-layout title="{{ $title }}">
    <x-HeadTitle title="{{ $title }}"> </x-HeadTitle>
    <x-breadcrumb>
        <x-breadcrumb-link link="/dashboard"> Dashboard </x-breadcrumb-link>
        <x-breadcrumb-link link="/dashboard/maintenance">
            Maintenance Management
        </x-breadcrumb-link>

        <x-breadcrumb-link-active>{{ $title }} </x-breadcrumb-link-active>
    </x-breadcrumb>
    <x-card>
        <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="row">
                    <small class="col-md-3">Unit Name</small>
                    <small class="col-md-6">: {{ $data->unit->name }}</small>
                </div>
                <div class="row">
                    <small class="col-md-3">Brand Type</small>
                    <small class="col-md-6">
                        : {{ $data->unit->type->brand->name }}
                        {{ $data->unit->type->name }}
                    </small>
                </div>
                <div class="row">
                    <small class="col-md-3">carosery</small>
                    <small class="col-md-6">
                        : {{ $data->unit->carosery->name }}
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <small class="col-md-3">Date</small>
                    <small class="col-md-6"
                        >:
                        {{ \Carbon\Carbon::parse($data->tgl)->format('d/m/Y') }}</small
                    >
                </div>
                <div class="row">
                    <small class="col-md-3">Repaire Request</small>
                    <small class="col-md-6"> : {{ $data->name }} </small>
                </div>
                <div class="row">
                    <small class="col-md-3">Description</small>
                    <small class="col-md-6"> : {{ $data->description }} </small>
                </div>
                <div class="row">
                    <small class="col-md-3">Estimasi</small>
                    <small class="col-md-6">
                        : @php $est = date_diff($data->finish, $data->tgl);
                        @endphp {{ $est }}
                    </small>
                </div>
            </div>
        </div>
    </x-card>
</x-admin-layout>
